<?php

namespace app\modules\audit_trail\controllers;

use app\modules\ia\lib\Flash;
use Yii;
use app\modules\audit_trail\models\AuditTrail;
use app\modules\audit_trail\models\search\AuditTrailSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\modules\ia\Module as IA;

/**
 * DefaultController implements the CRUD actions for AuditTrail model.
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['superadmin'], // @todo Rendre la règle d'accès paramétrable
                    ],
                ],
            ],
        ];
    }

    /**
     * @param \yii\base\Action $action
     * @return bool
     */
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        // Contrôle d'accès
        // @todo rendre configurable la liste ds rôles autorisés
        if (!Yii::$app->user->can('superadmin')) {
            Flash::danger(IA::t('messages', 'You are not allowed to access this page'));
            $this->redirect('/');
            return false;
        }

        return true;
    }

    /**
     * Lists all AuditTrail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuditTrailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuditTrail model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Deletes an existing AuditTrail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuditTrail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuditTrail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuditTrail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

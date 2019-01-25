<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

use app\modules\audit_trail\Module as Module;
use app\modules\ia\Module as IA;

/**
 * @var $this yii\web\View
 * @var $searchModel app\modules\audit_trail\models\search\AuditTrailSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = Module::t('labels', 'Audit Trails');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="audit-trail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'transaction_id:ntext',
            'user_id',
            'user_information:ntext',
            'message:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}'
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>

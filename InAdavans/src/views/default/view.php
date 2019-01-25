<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use app\modules\ia\Module as IA;
use app\modules\audit_trail\Module as Module;

/**
 * @var $this yii\web\View
 * @var $model app\modules\audit_trail\models\AuditTrail
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Module::t('labels', 'Audit Trails'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="audit-trail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(IA::t('labels', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('labels', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'transaction_id:ntext',
            'user_id',
            'user_information:ntext',
            'context:ntext',
            'event:ntext',
            'data:ntext',
            'message:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

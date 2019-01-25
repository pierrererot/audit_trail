<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\audit_trail\models\search\AuditTrailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="audit-trail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'transaction_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'user_information') ?>

    <?= $form->field($model, 'context') ?>

    <?php // echo $form->field($model, 'event') ?>

    <?php // echo $form->field($model, 'data') ?>

    <?php // echo $form->field($model, 'message') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('labels', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('labels', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

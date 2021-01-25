<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $this yii\web\View
 * @var $model app\models\Feedback
 * @var $form ActiveForm
 * @var $enableAjax bool
 * @var $controllerForm string
 * @var $actionForm string
 */
?>
<div class="feedback-form">

    <?php $form = ActiveForm::begin([
        'id' => $controllerForm,
        'action' => $actionForm,
        'enableAjaxValidation' => $enableAjax,
    ]); ?>

    <?= $form->field($model, 'customer') ?>
    <?= $form->field($model, 'phone') ?>

    <?= $form->errorSummary($model) ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- feedback-form -->

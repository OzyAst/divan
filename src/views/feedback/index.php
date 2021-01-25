<?php
/* @var $this yii\web\View */
$this->title = 'Обратная связь';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <?= \app\components\feedback\form\FeedbackFormWidget::widget() ?>
            </div>
        </div>
    </div>
</div>
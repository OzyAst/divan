<?php
namespace app\components\feedback\form;

use app\components\feedback\form\assets\FeedbackFormAsset;
use app\models\Feedback;
use yii\base\Widget;

/**
 * Форма обратной связи
 */
class FeedbackFormWidget extends Widget
{
    private $controllerForm = "feedback";
    private $actionForm = "save";
    private $enableAjax = false;
    private $model = Feedback::class;

    public function init()
    {
        FeedbackFormAsset::register($this->view);
        parent::init();
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        return $this->render('_form', [
            'model' => new $this->model,
            'enableAjax' => $this->enableAjax,
            'controllerForm' => $this->controllerForm,
            'actionForm' => $this->actionForm,
        ]);
    }
}

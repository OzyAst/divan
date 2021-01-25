<?php

namespace app\services\feedback;

use app\components\feedback\form\FeedbackSaveFormHandler;
use app\components\feedback\form\requests\FeedbackFormRequest;

/**
 * Работа с обратной связью
 */
class FeedbackService
{
    /**
     * @var FeedbackSaveFormHandler
     */
    private $formHandler;

    public function __construct()
    {
        $this->formHandler = new FeedbackSaveFormHandler();
    }

    /**
     * Сохранить форму обратной связи
     * @param FeedbackFormRequest $request
     * @throws \yii\base\Exception
     */
    public function save(FeedbackFormRequest $request)
    {
        $this->formHandler->handle($request);
    }
}
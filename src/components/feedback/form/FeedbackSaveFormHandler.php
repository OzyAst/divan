<?php

namespace app\components\feedback\form;

use app\components\feedback\form\requests\FeedbackFormRequest;
use app\models\Feedback;
use yii\base\Exception;

/**
 * Сохранить форму обратной связи
 */
class FeedbackSaveFormHandler
{
    /**
     * @param FeedbackFormRequest $request
     * @throws Exception
     */
    public function handle(FeedbackFormRequest $request) {
        $model = new Feedback();
        $model->attributes = $request->toArray();

        if (!$model->save()) {
            $message = $model->getErrors();
            $message = array_shift($message);
            throw new Exception($message[0]);
        }
    }
}
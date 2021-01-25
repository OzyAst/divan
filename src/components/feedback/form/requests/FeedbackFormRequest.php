<?php

namespace app\components\feedback\form\requests;

use app\models\Feedback;
use app\requests\Request;

/**
 * Форма обратной связи
 *
 * @var string $customer
 * @var string $phone
 */
class FeedbackFormRequest extends Request
{
    public $customer;
    public $phone;

    public function rules()
    {
        return [
            [['phone'], 'required'],
            [['phone', 'customer'], 'string'],
            [['phone', 'customer'], 'trim'],
            ['phone', 'validatePhone'],
        ];
    }

    /**
     * Валидация телефона
     * @param $attribute
     * @param $params
     */
    public function validatePhone($attribute, $params)
    {
        if (!preg_match(Feedback::PREG_VALIDATE_PHONE, $this->$attribute)) {
            $this->addError($attribute, 'Incorrect phone.');
        }
    }
}

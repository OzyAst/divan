<?php

namespace app\requests;

use yii\base\Model;
use yii\base\UserException;

abstract class Request extends Model
{
    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->validationWithException();
    }

    /**
     * Проверка на ошибки
     * @return self
     * @throws UserException
     */
    public function validationWithException(): self
    {
        if (!$this->validate()) {
            $message = $this->getErrors();
            $message = array_shift($message);
            throw new UserException($message[0]);
        }
        return $this;
    }
}
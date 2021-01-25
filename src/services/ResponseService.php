<?php

namespace app\services;

use Yii;
use yii\base\Exception;
use yii\web\Response;

/**
 * Формирует ответ и отправляет
 *
 * Class ResponseService
 * @package app\services
 */
class ResponseService
{
    /**
     * Вернем ответ
     * @param array|null $array - Дополнительный массив в ответ
     * @param bool $success - Флаг успешного выполнения
     * @param int $code - код ответа
     * @return mixed
     * @throws Exception
     */
    public function send(array $array, $success = true, $code = 200)
    {
        $response = Yii::$app->response;
        // Если это не ajax запрос,
        // выбросим исключение для генерации старницы с ошибкой
        if (!Yii::$app->request->isAjax) {
            throw new Exception($array['message']);
        }

        $response->format = Response::FORMAT_JSON;

        // Дополним ответ ключем success (чтобы не писать в каждом запросе)
        if (!isset($array["success"])) {
            $array["success"] = $success;
        }

        $response->data = $array;
        $response->statusCode = $code;
        $response->send();
        return;
    }
}

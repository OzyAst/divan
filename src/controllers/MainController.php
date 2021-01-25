<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\services\ResponseService;

/**
 * @property ResponseService $responseSend
 */
class MainController extends Controller
{
    /**
     * @var ResponseService
     */
    public $responseSend;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);

        $this->responseSend = new ResponseService();
    }

    /**
     * Дополним вызов экшенов:
     *  - Обернем все запросы в блок try с отловом исключения Exception
     *
     * @param string $id
     * @param array $params
     * @return array|mixed
     * @throws \yii\base\Exception
     */
    public function runAction($id, $params = [])
    {
        try {
            return parent::runAction($id, $params);
        } catch (\Exception $e) {
            $this->responseSend->send(['message' => $e->getMessage()], false);
        }
    }
}

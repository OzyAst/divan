<?php

namespace app\controllers;

use Yii;
use app\components\feedback\form\requests\FeedbackFormRequest;
use app\services\feedback\FeedbackService;
use yii\filters\VerbFilter;

class FeedbackController extends MainController
{
    /**
     * @var FeedbackService
     */
    private $service;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'save' => ['post'],
                ],
            ],
        ];
    }

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);

        $this->service = new FeedbackService();
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * AJAX
     * Сохранить форму обратной связи
     */
    public function actionSave()
    {
        $request = new FeedbackFormRequest($_POST['Feedback']);
        $this->service->save($request);

        $this->responseSend->send([]);
    }
}

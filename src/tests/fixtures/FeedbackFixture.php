<?php
namespace tests\fixtures;

use app\models\Feedback;
use yii\test\ActiveFixture;

/**
 * Обратная связь
 */
class FeedbackFixture extends ActiveFixture
{
    public $modelClass = Feedback::class;

    public function getData()
    {
        return [
            ['customer' => 'divan', 'phone' => '+7(999)999-99-99'],
            ['customer' => 'anonymous', 'phone' => '+0(000)000-00-00']
        ];
    }
}
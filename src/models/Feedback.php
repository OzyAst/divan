<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string|null $customer ФИО
 * @property string $phone телефон
 * @property string $status
 */
class Feedback extends \yii\db\ActiveRecord
{
    const PREG_VALIDATE_PHONE = "/^\+7\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}$/";
    const STATUS_AVAILABLE = [
        "На модерации",
        "Обработана",
        "Отклонена",
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone'], 'required'],
            [['status'], 'string'],
            [['customer'], 'string', 'max' => 256],
            [['phone'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer' => 'ФИО',
            'phone' => 'телефон',
            'status' => 'Status',
        ];
    }
}

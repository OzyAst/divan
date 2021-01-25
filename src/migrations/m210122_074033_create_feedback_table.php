<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%feedback}}`.
 */
class m210122_074033_create_feedback_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("DROP TYPE IF EXISTS status;");
        $this->execute("CREATE TYPE status AS ENUM ('0', '1', '2');");

        $this->createTable('{{%feedback}}', [
            'id' => $this->primaryKey(),

            'customer' => $this->string(256)
                ->comment('ФИО'),

            'phone' => $this->char(16)->notNull()->check("LENGTH(phone) > 0")
                ->comment('телефон'),

            'status' => "status NOT NULL DEFAULT '0'",
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%feedback}}');
    }
}

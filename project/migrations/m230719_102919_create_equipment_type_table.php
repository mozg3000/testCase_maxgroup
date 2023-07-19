<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%equipment_type}}`.
 */
class m230719_102919_create_equipment_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%equipment_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique()->comment('Название категории оборудывания'),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->dateTime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%equipment_type}}');
    }
}

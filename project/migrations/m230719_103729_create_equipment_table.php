<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%equipment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%equipment_type}}`
 */
class m230719_103729_create_equipment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%equipment}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Название оборудывания'),
            'inv_no' => $this->string()->unique()->notNull()->comment('Инвентарный номер'),
            'id_equipment_type' => $this->integer()->notNull(),
            'created_at' => $this->datetime()->defaultExpression('CURRENT_TIMESTAMP'),
            'update_at' => $this->datetime(),
        ]);

        // creates index for column `id_equipment_type`
        $this->createIndex(
            '{{%idx-equipment-id_equipment_type}}',
            '{{%equipment}}',
            'id_equipment_type'
        );

        // add foreign key for table `{{%equipment_type}}`
        $this->addForeignKey(
            '{{%fk-equipment-id_equipment_type}}',
            '{{%equipment}}',
            'id_equipment_type',
            '{{%equipment_type}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%equipment_type}}`
        $this->dropForeignKey(
            '{{%fk-equipment-id_equipment_type}}',
            '{{%equipment}}'
        );

        // drops index for column `id_equipment_type`
        $this->dropIndex(
            '{{%idx-equipment-id_equipment_type}}',
            '{{%equipment}}'
        );

        $this->dropTable('{{%equipment}}');
    }
}

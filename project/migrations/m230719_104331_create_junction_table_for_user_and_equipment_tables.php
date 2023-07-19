<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_equipment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%equipment}}`
 */
class m230719_104331_create_junction_table_for_user_and_equipment_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_equipment}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'equipment_id' => $this->integer(),
            'rent_start_date' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP')->comment('Дата выдачи'),
            'rent_end_date' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP')->comment('Дата возврата'),
            'rent_status' =>  $this->smallInteger()->defaultValue(0)->comment('Статус аренды'),
            'created_at' => $this->datetime()->defaultExpression('CURRENT_TIMESTAMP'),
            'update_at' => $this->datetime(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user_equipment-user_id}}',
            '{{%user_equipment}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_equipment-user_id}}',
            '{{%user_equipment}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `equipment_id`
        $this->createIndex(
            '{{%idx-user_equipment-equipment_id}}',
            '{{%user_equipment}}',
            'equipment_id'
        );

        // add foreign key for table `{{%equipment}}`
        $this->addForeignKey(
            '{{%fk-user_equipment-equipment_id}}',
            '{{%user_equipment}}',
            'equipment_id',
            '{{%equipment}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-user_equipment-user_id}}',
            '{{%user_equipment}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-user_equipment-user_id}}',
            '{{%user_equipment}}'
        );

        // drops foreign key for table `{{%equipment}}`
        $this->dropForeignKey(
            '{{%fk-user_equipment-equipment_id}}',
            '{{%user_equipment}}'
        );

        // drops index for column `equipment_id`
        $this->dropIndex(
            '{{%idx-user_equipment-equipment_id}}',
            '{{%user_equipment}}'
        );

        $this->dropTable('{{%user_equipment}}');
    }
}

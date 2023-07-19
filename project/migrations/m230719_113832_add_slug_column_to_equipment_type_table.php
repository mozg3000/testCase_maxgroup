<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%equipment_type}}`.
 */
class m230719_113832_add_slug_column_to_equipment_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%equipment_type}}', 'slug', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%equipment_type}}', 'slug');
    }
}

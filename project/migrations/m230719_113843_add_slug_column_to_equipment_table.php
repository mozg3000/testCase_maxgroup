<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%equipment}}`.
 */
class m230719_113843_add_slug_column_to_equipment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%equipment}}', 'slug', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%equipment}}', 'slug');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m201103_084234_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id'          => $this->primaryKey(),
            'parent_id'   => $this->integer(10)->notNull()->defaultValue(0),
            'title'       => $this->string(255)->notNull(),
            'description' => $this->string(255),
            'keywords'    => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}

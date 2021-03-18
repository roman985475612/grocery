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

        $this->batchInsert('{{%category}}', ['id', 'parent_id', 'title'], [
            [1, 0, 'Branded Foods'],
            [2, 0, 'Househols'],
            [3, 0, 'Veggiets & Fruits'],
            [4, 0, 'Kitchen'],
            [5, 0, 'Meat & Fish'],
            [6, 0, 'Beverages'],
            [7, 0, 'Pet Food'],
            [8, 0, 'Frozen Foods'],
            [9, 0, 'Bread & Bakery'],
            [10, 3, 'Vegetables'],
            [11, 3, 'Fruits'],
            [12, 6, 'Soft Drinks'],
            [13, 6, 'Juices'],
            [14, 8, 'Frozen Snaks'],
            [15, 8, 'Frozen Nonveg'],
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

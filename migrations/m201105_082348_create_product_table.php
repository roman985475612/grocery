<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m201105_082348_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id'          => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'title'       => $this->string(255)->notNull(),
            'content'     => $this->text()->notNull(),
            'price'       => $this->decimal(6, 2)->notNull()->defaultValue(0.00),
            'old_price'   => $this->decimal(6, 2)->notNull()->defaultValue(0.00),
            'description' => $this->string(255)->defaultValue(null),
            'keywords'    => $this->string(255)->defaultValue(null),
            'img'         => $this->string(255)->notNull()->defaultValue('no-image.png'),
            'is_offer'    => $this->tinyInteger(4)->notNull()->defaultValue(0),
        ]);

        $this->createIndex(
            'idx-product-category_id',
            'product',
            'category_id'
        );

        $this->addForeignKey(
            'fk-product-category_id',
            'product',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}

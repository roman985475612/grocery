<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_product}}`.
 */
class m201117_070855_create_order_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_product}}', [
            'id'         => $this->primaryKey(),
            'order_id'   => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'title'      => $this->string(255)->notNull(),
            'price'      => $this->decimal(6, 2)->notNull()->defaultValue(0.00),
            'qty'        => $this->tinyInteger(4)->notNull(),
            'total'      => $this->decimal(6, 2)->notNull(),
        ]);

        $this->createIndex(
            'idx-order_product-order_id',
            'order_product',
            'order_id'
        );

        $this->createIndex(
            'idx-order_product-product_id',
            'order_product',
            'product_id'
        );

        $this->addForeignKey(
            'fk-order_product-order_id',
            'order_product',
            'order_id',
            'orders',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-order_product-product_id',
            'order_product',
            'product_id',
            'product',
            'id',
            'CASCADE'
        );
    }
  
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx-order_product-order_id',
            'order_product'
        );

        $this->dropIndex(
            'idx-order_product-product_id',
            'order_product'
        );

        $this->dropForeignKey(
            'fk-order_product-order_id',
            'order_product'
        );

        $this->dropForeignKey(
            'fk-order_product-product_id',
            'order_product'
        );

        $this->dropTable('{{%order_product}}');
    }
}

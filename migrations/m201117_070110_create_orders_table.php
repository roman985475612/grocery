<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m201117_070110_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id'         => $this->primaryKey(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'qty'        => $this->tinyInteger(3)->unsigned()->notNull(),
            'total'      => $this->decimal(6, 2)->notNull()->defaultValue(0.00),
            'status'     => $this->tinyInteger(4)->notNull()->defaultValue(0),
            'name'       => $this->string(255)->notNull(),
            'email'      => $this->string(255)->notNull(),
            'phone'      => $this->string(255)->notNull(),
            'address'    => $this->string(255)->notNull(),
            'note'       => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orders}}');
    }
}

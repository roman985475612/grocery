<?php

use yii\db\Migration;

/**
 * Class m210316_142202_creata_testimonials_table
 */
class m210316_142202_creata_testimonials_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%testimonials}}', [
            'id'          => $this->primaryKey(),
            'name'        => $this->string(255)->notNull(),
            'position'    => $this->string(255)->notNull(),
            'description' => $this->text()->notNull(),
        ]);

        $this->batchInsert('{{%testimonials}}', ['name', 'position', 'description'], [
            ['Andrew Smith', 'Customer', 'Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores'],
            ['Thomson Richard', 'Customer', 'Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores'],
            ['Crisp Kale', 'Customer', 'Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores'],
            ['John Paul', 'Customer', 'Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores'],
            ['Rosy Carl', 'Customer', 'Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores'],
            ['Rockson Doe', 'Customer', 'Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%testimonials}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210316_142202_creata_testimonials_table cannot be reverted.\n";

        return false;
    }
    */
}

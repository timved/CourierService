<?php

use yii\db\Migration;

/**
 * Class m180709_210251_dropTable_news_galleries_table
 */
class m180709_210251_dropTable_news_galleries_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('news_galleries');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->createTable('news_galleries', [
            'id' => $this->primaryKey(),
            'guid_gallery' => $this->char(36),
            'id_new' => $this->integer(),
        ]);
        $this->addForeignKey('fk_news_galleries_news', 'news_galleries','id_new','news','id');
        $this->addForeignKey('fk_news_galleries_galleries', 'news_galleries','guid_gallery','galleries','guid');
        echo "m180709_210251_dropTable_news_galleries_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180709_210251_dropTable_news_galleries_table cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news_gallery`.
 */
class m180707_173646_create_news_gallery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('news_galleries', [
            'id' => $this->primaryKey(),
            'guid_gallery' => $this->char(36),
            'id_new' => $this->integer(),
        ]);
        $this->addForeignKey('fk_news_galleries_news', 'news_galleries','id_new','news','id');
        $this->addForeignKey('fk_news_galleries_galleries', 'news_galleries','guid_gallery','galleries','guid');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('news_galleries');
    }
}

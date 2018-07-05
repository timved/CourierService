<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m180705_174508_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey()->unsigned(),
            'slug' => $this->string()->unique()->notNull(),
            'preview' => $this->string(),
            'created_at' => $this->timestamp(),
            'header' => $this->string(),
            'content'=> $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('news');
    }
}

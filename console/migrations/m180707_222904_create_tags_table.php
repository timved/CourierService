<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tags`.
 */
class m180707_222904_create_tags_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tags', [
            'id' => $this->primaryKey(),
            'name' => $this->char(200),
            'gallery_guid' => $this->string(),
        ]);
        $this->addForeignKey('fk_tags_galleries', 'tags','gallery_guid','galleries','guid');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tags');
    }
}

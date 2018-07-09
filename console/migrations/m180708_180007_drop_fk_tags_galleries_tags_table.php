<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `fk_tags_galleries_tags`.
 */
class m180708_180007_drop_fk_tags_galleries_tags_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk_tags_galleries', 'tags');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addForeignKey('fk_tags_galleries', 'tags','gallery_guid','galleries','guid' );
    }
}

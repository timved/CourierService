<?php

use yii\db\Migration;

/**
 * Class m180708_180143_add_fk_cascade_tags_galleries_tags_table
 */
class m180708_180143_add_fk_cascade_tags_galleries_tags_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_tags_galleries', 'tags','gallery_guid','galleries','guid','cascade', 'cascade' );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_tags_galleries', 'tags');
        echo "m180708_180143_add_fk_cascade_tags_galleries_tags_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180708_180143_add_fk_cascade_tags_galleries_tags_table cannot be reverted.\n";

        return false;
    }
    */
}

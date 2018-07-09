<?php

use yii\db\Migration;

/**
 * Class m180708_110616_altercolumn__name_tags_table
 */
class m180708_110616_altercolumn__name_tags_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('tags','name','varchar(255)');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('tags','name','char(200)');
        echo "m180708_110616_altercolumn__name_tags_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180708_110616_altercolumn__name_tags_table cannot be reverted.\n";

        return false;
    }
    */
}

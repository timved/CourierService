<?php

use yii\db\Migration;

/**
 * Handles the creation of table `gallery`.
 */
class m180705_175514_create_gallery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('galleries', [
            'guid' => $this->char(36)->unique()->notNull() . ' PRIMARY KEY',
            'img' => $this->string(),
            'description' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('galleries');
    }
}

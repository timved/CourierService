<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $slug
 * @property string $preview
 * @property string $created_at
 * @property string $header
 * @property string $content
 */
class News extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slug'], 'required'],
            [['created_at'], 'safe'],
            [['content'], 'string'],
            [['slug', 'preview', 'header'], 'string', 'max' => 255],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'preview' => 'Preview',
            'created_at' => 'Created At',
            'header' => 'Header',
            'content' => 'Content',
        ];
    }
}
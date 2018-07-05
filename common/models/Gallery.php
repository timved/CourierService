<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property string $guid
 * @property array $tags
 * @property string $img
 * @property string $description
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['guid'], 'required'],
            [['tags'], 'safe'],
            [['description'], 'string'],
            [['guid'], 'string', 'max' => 36],
            [['img'], 'string', 'max' => 255],
            [['guid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'guid' => 'Guid',
            'tags' => 'Tags',
            'img' => 'Img',
            'description' => 'Description',
        ];
    }
}

<?php

namespace common\models;

use Yii;
use yii\imagine\Image;

/**
 * This is the model class for table "galleries".
 *
 * @property string $guid
 * @property string $img
 * @property string $description
 *
 * @property NewsGalleries[] $newsGalleries
 * @property Tags[] $tags
 */
class Gallery extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    public static function tableName()
    {
        return 'galleries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['file'], 'file', 'extensions' => 'png, jpg, jpeg, gif', 'wrongExtension' => 'Допустимый формат файла: png, jpg, jpeg, gif'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'guid' => 'Guid',
            'img' => 'img',
            'description' => 'description',
            'file' => 'Img'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['gallery_guid' => 'guid']);
    }

    public function findGallery($gallery)
    {
        $mass =[];
        foreach($gallery as  $key => $value) {
            $mass[$key] = $value;
        }

        $mass2=[];
        foreach ($gallery->tags as $key => $value) {
            $mass2[$key]['id'] = $value->id;
            $mass2[$key]['name'] = $value->name;
        }

        $mass['tags'] = $mass2;
        return $mass;
    }

}

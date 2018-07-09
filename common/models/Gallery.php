<?php

namespace common\models;

use Yii;

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
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
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
//            [['guid'], 'required'],
            [['description'], 'string'],
//            [['guid'], 'string', 'max' => 36],
//            [['img'], 'string', 'max' => 255],
//            [['guid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'guid' => 'Guid',
            'img' => 'Картинка',
            'description' => 'Описание',
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

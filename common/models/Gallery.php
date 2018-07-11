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
//            [['guid'], 'required'],
            [['description'], 'string'],
            [['file'], 'file', 'extensions' => 'png, jpg, jpeg, gif', 'wrongExtension' => 'Допустимый формат файла: png, jpg, jpeg, gif'],
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

    public function updateImg()
    {
        $gallery = new Gallery();
        $gallery->guid = Uuid::uuid4();
        $gallery->description = $this->description;
        $this->guid = $gallery->guid->toString();
        $file = $this->file;
        $fileName = $file->getBaseName() . "{$gallery->guid->toString()}" . "." . $file->getExtension();
        $filePath = \Yii::getAlias("@webroot/img/$fileName");
        $gallery->img = $filePath;
        $gallery->save();

        $this->createTag($gallery->guid);
        $this->file->saveAs($filePath);
        Image::thumbnail("@webroot/img/$fileName", 200, 200)->save(\Yii::getAlias("@webroot/img/small/$fileName",['quality' => 70]));
    }
}

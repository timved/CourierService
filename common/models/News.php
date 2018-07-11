<?php

namespace common\models;

use Yii;
use yii\imagine\Image;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $slug
 * @property string $preview
 * @property string $created_at
 * @property string $header
 * @property string $content
 *
 * @property NewsGalleries[] $newsGalleries
 */
class News extends ActiveRecord
{
    public $file;
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
            [['file'], 'file', 'extensions' => 'png, jpg, jpeg, gif', 'wrongExtension' => 'Допустимый формат файла: png, jpg, jpeg, gif'],
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
            'file' => 'Preview'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function createImg()
    {
        $file = $this->file;
        $fileName = $file->getBaseName() . "{$this->header}" . "." . $file->getExtension();
        $filePath = \Yii::getAlias("@webroot/img/$fileName");
        $this->preview = $filePath;
        $this->save();
        $this->file->saveAs($filePath);
        Image::thumbnail("@webroot/img/$fileName", 200, 200)->save(\Yii::getAlias("@webroot/img/small/$fileName",['quality' => 70]));

    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news_galleries".
 *
 * @property int $id
 * @property string $guid_gallery
 * @property int $id_new
 *
 * @property Galleries $guidGallery
 * @property News $new
 */
class NewsGalleries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_galleries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_new'], 'default', 'value' => null],
            [['id_new'], 'integer'],
            [['guid_gallery'], 'string', 'max' => 36],
            [['guid_gallery'], 'exist', 'skipOnError' => true, 'targetClass' => Galleries::className(), 'targetAttribute' => ['guid_gallery' => 'guid']],
            [['id_new'], 'exist', 'skipOnError' => true, 'targetClass' => News::className(), 'targetAttribute' => ['id_new' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'guid_gallery' => 'Guid Gallery',
            'id_new' => 'Id New',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGuidGallery()
    {
        return $this->hasOne(Galleries::className(), ['guid' => 'guid_gallery']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNew()
    {
        return $this->hasOne(News::className(), ['id' => 'id_new']);
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tags".
 *
 * @property int $id
 * @property string $name
 * @property string $gallery_guid
 *
 * @property Gallery $galleryGu
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 200],
            [['gallery_guid'], 'string', 'max' => 255],
            [['gallery_guid'], 'exist', 'skipOnError' => true, 'targetClass' => Gallery::className(), 'targetAttribute' => ['gallery_guid' => 'guid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'gallery_guid' => 'Gallery Guid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalleryGu()
    {
        return $this->hasOne(Gallery::className(), ['guid' => 'gallery_guid']);
    }
}

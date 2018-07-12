<?php
/**
 * Created by PhpStorm.
 * User: Hpp
 * Date: 06.07.2018
 * Time: 0:06
 */

namespace common\models;


use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\imagine\Image;

class ActiveRecord extends \yii\db\ActiveRecord
{

    public function createImg($img, $unique)
    {
        $file = $this->file;
        $fileName = $file->getBaseName() . "{$unique}" . "." . $file->getExtension();
        $filePath = \Yii::getAlias("@webroot/img/$fileName");
        $this->$img = $filePath;
        $this->save();
        $this->file->saveAs($filePath);
        Image::thumbnail("@webroot/img/$fileName", 200, 200)->save(\Yii::getAlias("@webroot/img/small/$fileName",['quality' => 70]));
    }

}
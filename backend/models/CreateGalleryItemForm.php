<?php
/**
 * Created by PhpStorm.
 * User: Hpp
 * Date: 07.07.2018
 * Time: 21:51
 */

namespace backend\models;


use common\models\Gallery;
use common\models\Tag;
use Ramsey\Uuid\Uuid;
use yii\base\Model;
use yii\imagine\Image;

class CreateGalleryItemForm extends Model
{
    public $guid;
    public $file;
    public $description;
    public $name;


    public function rules()
    {
        return [
            [['description'],'required','message' => 'пустой комментарий'],
            [['file'], 'file', 'extensions' => 'png, jpg, jpeg, gif', 'wrongExtension' => 'Допустимый формат файла: png, jpg, jpeg, gif'],
            [['name'], 'string'],
            [['name'],'required','message' => 'поле обязательно для заполнения'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'description' => 'Описание',
            'file' => 'Загрузить картинку',
            'name' => 'Введите названия тэгов через пробел',
        ];
    }

    public function createGalleryItem()
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

    public function createTag($guid)
    {
        $name = explode(" ",$this->name);
        foreach ( $name as $item){
            $tag = new Tag();
            $tag->name = $item;
            $tag->gallery_guid = $guid;
            $tag->save();
        }
    }



}
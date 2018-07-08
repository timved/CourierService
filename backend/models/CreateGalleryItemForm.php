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
        ];
    }

    public function attributeLabels()
    {
        return [
            'description' => 'Описание',
            'file' => 'Загрузить картинку',
        ];
    }

    public function createGalleryItem()
    {
//        $comment = new Comment();
//        $comment->task_id = $this->task_id;
//        $comment->name = $this->name;
//        $comment->description = $this->description;
//        $comment->save();
//        foreach ($this->files as $file) {
            $gallery = new Gallery();

            $gallery->guid = Uuid::uuid4();
            $gallery->description = $this->description;
            $file = $this->file;
            $this->createTag($gallery->guid);
//            $image->comment_id = $comment->id;
            $fileName = $file->getBaseName() . "{$gallery->guid->toString()}" . "." . $file->getExtension();
            $filePath = "@webroot/img/" . $fileName;
            $gallery->img = $fileName;
            $gallery->save();



            $this->file->saveAs(\Yii::getAlias($filePath));
            Image::thumbnail("@webroot/img/$fileName", 200, 200)->save(\Yii::getAlias("@webroot/img/small/$fileName",['quality' => 70]));
//        }

    }

    public function createTag($guid)
    {
        $tag = new Tag();
        $tag->gallery_guid = $guid;
        $tag->name = $this->name;
        $tag->save();
    }


}
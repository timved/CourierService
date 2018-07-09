<?php
/**
 * Created by PhpStorm.
 * User: Hpp
 * Date: 09.07.2018
 * Time: 13:39
 */

namespace frontend\controllers;


use common\models\Gallery;
use common\models\News;
use yii\web\Controller;

class JsonController extends Controller
{
    public function init()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    }
    public function actionNews()
    {
        $news = News::find()->all();
        return $news;
    }

    public function actionOneNews($id)
    {
        $news = News::find()->where('id = :id', [':id' => $id])->one();
        return $news;
    }

    public function actionGalleries()
    {
        $galleries = Gallery::find()->joinWith('tags')->all();
        $allGallery = [];
        foreach ($galleries as $gallery){
           $allGallery[] =  $gallery->findGallery($gallery);
        }
        return $allGallery;
    }

    public function actionOneGallery($guid)
    {
        $gallery = Gallery::find()->joinWith('tags')->where('guid = :guid',[':guid' => $guid])->one();
        return $gallery->findGallery($gallery);
    }

}
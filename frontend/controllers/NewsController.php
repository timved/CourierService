<?php
/**
 * Created by PhpStorm.
 * User: Hpp
 * Date: 09.07.2018
 * Time: 0:57
 */

namespace frontend\controllers;


use common\models\News;
use yii\rest\ActiveController;
use yii\rest\Controller;

class NewsController extends Controller
{
//    public $modelClass = 'common\models\news';
    public function actionNews($id)
    {
//        header('Content-Type: application/json');
        return News::findOne($id);
    }



}
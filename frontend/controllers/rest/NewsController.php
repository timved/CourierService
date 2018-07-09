<?php
/**
 * Created by PhpStorm.
 * User: Hpp
 * Date: 09.07.2018
 * Time: 0:57
 */

namespace frontend\controllers;


use yii\rest\ActiveController;
use yii\web\Response;

class NewsController extends ActiveController
{
    public $modelClass = 'common\models\news';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        return $behaviors;
    }

}
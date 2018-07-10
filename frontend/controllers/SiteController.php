<?php

namespace frontend\controllers;

use common\models\Gallery;
use common\models\News;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    }

    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_HTML;
    return $this->render("index");
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
        foreach ($galleries as $gallery) {
            $allGallery[] = $gallery->findGallery($gallery);
        }
        return $allGallery;
    }

    public function actionOneGallery($guid)
    {
        $gallery = Gallery::find()->joinWith('tags')->where('guid = :guid', [':guid' => $guid])->one();
        return $gallery->findGallery($gallery);
    }
}

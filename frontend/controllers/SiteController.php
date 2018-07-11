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

    public function actionFindNews($id = NULL , $slug = NULL, $preview = NULL, $created_at = NULL, $header = NULL, $content = NULL)
    {
        $news = News::find()->filterWhere([
            'id' => $id,
            'slug' => $slug,
            'preview' => $preview,
            'DATE(created_at)' => $created_at,
            'header' => $header,
            'content' => $content,
        ])->all();
        return $news;
    }

    public function actionFindGallery($guid =NULL, $img = NULL, $description = NULL, $name = NULL)
    {
        $galleries = Gallery::find()->joinWith('tags')->filterWhere([
            'guid' => $guid,
            'img' => $img,
            'description' => $description,
            'name' => $name,
        ])->all();
        $allGallery = [];
        foreach ($galleries as $gallery) {
            $allGallery[] = $gallery->findGallery($gallery);
        }
        return $allGallery;
    }
}

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Tag */
$guid = Yii::$app->request->get();
$this->title = 'Create Tag';
$this->params['breadcrumbs'][] = ['label' => 'Tags', 'url' => ['index', 'guid' => $guid['guid']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tag-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>



<div class="gallery-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'guid')->textInput(['maxlength' => true]) ?>

<!--    --><?php //foreach ($model->tags as $tag):?>
<!--        --><?//= var_dump($tag['name']) ?>

<!--    --><?//= $form->field($tag, 'name')->textInput() ?>

<!--    --><?php //endforeach; ?>
<!--    --><?//= $form->field($model, 'img')->fileInput() ?>

    <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?=Html::a('Тэги', ['/tag/index', 'guid' => $model->guid], ['class' => 'btn btn-primary'])
        ?>
    </div>

<!--    --><?//= var_dump($model->tags) ?>

    <?php ActiveForm::end(); ?>

</div>

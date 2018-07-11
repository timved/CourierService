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

    <?= $form->field($model, 'file')->fileInput() ?>

    <?php echo Html::label('Old img', 'update-img') ?>

    <?php echo Html::textInput('update-img', $model->img, [
        'class' => 'form-control',
        'readonly' => true,
    ]) ?>

<!--    --><?//= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?=Html::a('Тэги', ['/tag/index', 'guid' => $model->guid], ['class' => 'btn btn-primary'])
        ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>

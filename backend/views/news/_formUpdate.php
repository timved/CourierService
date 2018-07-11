<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\MenuAsset;
/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>


<!--    --><?php //$form = ActiveForm::begin([
//            'id' => 'reload-img'
//    ])?>

    <?= $form->field($model, 'preview')->fileInput() ?>
<!--    --><?php //echo Html::fileInput('button-img')?>

<?php echo Html::label('Old preview','update-img' )?>

    <?php echo Html::textInput('update-img', $model->preview, [
        'class' => 'form-control',
        'readonly' => true,
    ]) ?>

    <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
/**
 * Created by PhpStorm.
 * User: Hpp
 * Date: 07.07.2018
 * Time: 22:16
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
?>

<div class="gallery-form">

    <?php $form =ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>

<?php Pjax::begin(); ?>

<?php Pjax::end();?>
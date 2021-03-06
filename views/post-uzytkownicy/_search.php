<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PostUzytkownicy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uzytkownicy-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idUser') ?>

    <?= $form->field($model, 'user') ?>

    <?= $form->field($model, 'pass') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'admin') ?>

    <?php // echo $form->field($model, 'data_dodania') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

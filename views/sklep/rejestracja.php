<?php
/* @var $this yii\web\View */
?>
<h1>Rejestracja</h1>

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user') ?>

    <?= $form->field($model, 'pass')->input('password') ?>

    <?= $form->field($model, 'email')->input('email') ?>

    <div class="form-group">
        <?= Html::submitButton('Zarejestruj się', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

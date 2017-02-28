<?php
/* @var $this yii\web\View */
?>
<h1>Logowanie</h1>

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user') ?>

    <?= $form->field($model, 'pass')->input('password') ?>

    <div class="form-group">
        <?= Html::submitButton('Zaloguj się', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Uzytkownicy */

$this->title = 'Create Uzytkownicy';
$this->params['breadcrumbs'][] = ['label' => 'Uzytkownicies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uzytkownicy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

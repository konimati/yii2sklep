<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Uzytkownicy */

$this->title = $model->idUser;
$this->params['breadcrumbs'][] = ['label' => 'Uzytkownicies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uzytkownicy-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idUser], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idUser], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idUser',
            'user',
            'pass',
            'email:email',
            'admin',
            'data_dodania',
        ],
    ]) ?>

</div>

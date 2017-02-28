<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostUzytkownicy */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Uzytkownicies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uzytkownicy-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Uzytkownicy', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idUser',
            'user',
            'pass',
            'email:email',
            'admin',
            // 'data_dodania',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

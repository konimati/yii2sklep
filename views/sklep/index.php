

<h1>Produkty</h1>


<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
// foreach($authors as $author) {
//             echo "Author = {$author->nazwa}\n";
//             foreach($author->obrazies as $post) {
//                 echo "Title = {$post->url}\n";
//             }
//         }
foreach ($DaneProduktow as $ModelProduktowPokaz) 
{
	
	echo Html::a('<h2>'.$ModelProduktowPokaz->nazwa.'</h2>', ['sklep/produkt', 'id' => $ModelProduktowPokaz->idProdukty]);
	foreach($ModelProduktowPokaz->obrazies as $obrazy){
		echo Html::a(Html::img('@web/images/'.$obrazy->url.''),['sklep/produkt', 'id' => $ModelProduktowPokaz->idProdukty]);
		//echo '<h2>'.$obrazy->url.'</h2>';
	}
	
	echo '<p class ="data">Data dodania: '.$ModelProduktowPokaz->data_dodania.'</p>';
	echo '<p class ="cena">'.$ModelProduktowPokaz->cena.' zł/szt</p>';
	
}


use yii\widgets\LinkPager;

echo LinkPager::widget([
    'pagination' => $Strony,
]);
?>
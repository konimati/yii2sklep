<h1>Produkt:</h1>


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


echo '<h2>'.$ProduktModel->nazwa.'</h2>';
foreach($ProduktModel->obrazies as $obrazy)
{
	echo Html::img('@web/images/'.$obrazy->url.'');

}
echo '<br />';
echo '<select>';
	foreach($SmakProduktu as $smak){
		//echo Html::img('@web/images/'.$obrazy->url.'');
		echo '<option value="'.$smak->idSmaki.'">'.$smak->nazwa.'</option>';
	}
echo '</select>';
	//$filepath = Yii::app()->request->baseUrl.'/images/'.$ModelProduktowPokaz['url'];
	//echo CHtml::image($filepath, 'image', array('class' => 'banner'));
	echo '<p class ="data">Data dodania: '.$ProduktModel->data_dodania.'</p>';
	//echo '<p class ="data">Obraz: '.$ModelProduktowPokaz['url'].'</p>';
	echo '<p class ="tresc">'.$ProduktModel->opis.'</p>';
	echo '<p class ="cena">'.$ProduktModel->cena.' zł/szt</p>';
	// if($Kategoria[$ModelStrona['wpis_kategoria']] != '')
	// {
	// 	echo '<p class="kategoria">Kategoria: '.CHtml::link($Kategoria[$ModelStrona['wpis_kategoria']], array('blog/kategoria/'.$ModelStrona['wpis_kategoria'])).'</p>';
	// }



?>
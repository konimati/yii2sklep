<?php
use yii\helpers\Url;

// Url::to() calls UrlManager::createUrl() to create a URL
//$url = Url::to(['post/view', 'id' => 100]);
foreach ($DaneKategorie as $Kategorie) 
{
	//$url = Url::to(['sklep/produkt', 'id' => 100]);
	echo '<h2>'.$Kategorie->nazwa.'</h2>';
}
?>

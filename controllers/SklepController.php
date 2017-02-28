<?php

namespace app\controllers;

use app\models\Produkty;
use app\models\ProduktyHasSmaki;
use app\models\Smaki;
use app\models\Obrazy;
use app\models\Kategorie;
use app\models\LoginForm;
use app\models\Uzytkownicy;
use app\models\PostUzytkownicy;
use app\models\User;
use yii\data\Pagination;
use yii\web\Session;
use Yii;

class SklepController extends \yii\web\Controller
{
    public function actionIndex()
    {
        

        $count = Produkty::find()->indexBy('idProdukty')->count();
        $Strony = new Pagination(['totalCount' => $count]);
        $Strony->setPageSize(3);
        $DaneProduktow = Produkty::find()->offset($Strony->offset)->limit($Strony->limit)->all();
        
        
        return $this->render('index',
            array(
                'DaneProduktow' => $DaneProduktow,
                'Strony' => $Strony,
                )
            );
    }

    public function actionKategorie()
    {
        //$count = Produkty::find()->indexBy('idProdukty')->count();
        //$Strony = new Pagination(['totalCount' => $count]);
        //$Strony->setPageSize(3);
        $DaneKategorie = Kategorie::find()->all();
        
        
        return $this->render('kategorie',
            array(
                'DaneKategorie' => $DaneKategorie,
                )
            );
    }

    public function actionProdukt($id)
    {
        if(!is_numeric($id))
        {
            exit();
        }   

        $ProduktModel = Produkty::findOne($id);
        $ProduktyHasSmaki = $ProduktModel::findOne($id)->produktyHasSmakis;
        //$ProduktyHasSmaki = Produkty::findOne($id);
        //print_r($ProduktyHasSmaki); exit();
        foreach ($ProduktyHasSmaki as $Smaki) {
               //echo $Smaki->idSmaki;
               $SmakiProduktu[] = Smaki::findOne($Smaki->idSmaki);
        }

        // echo '<pre>';
        // print_r($SmakiProdukty);
        // echo '</pre>';
        

    

        // foreach ($WybranyProdukt as $Produkt) {
        //     $this->pageTitle = 'Produkt: '.$Produkt['nazwa'];
        // }

        return $this->render('produkt',
            array(
                'ProduktModel' => $ProduktModel,
                'SmakProduktu' => $SmakiProduktu,
                )
            );
    }

    public function actionLogin()
    {
        $model=new LoginForm;

        // collect user input data
        if($model->load(Yii::$app->request->post()))
        {
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }


        return $this->render('logowanie',
            array(
                'model'=>$model)
            );
    }

    public function actionRejestracja()
    {
        // if(Yii::$app->session['zalogowany'] == 'tak')
        // {
        //     $this->redirect(array('sklep/index'));
        // }

        //$users = Uzytkownicy::find()->indexBy('idUser')->all();
        $model = new Uzytkownicy();
       
        //print_r($model); exit();
        if($model->load(Yii::$app->request->post()))
        {
            //print_r($model->email); exit();
            $model->data_dodania= date("Y-m-d H:i:s"); 
            $model->admin= 0;           
            if($model->validate())
            {
                $hash = Yii::$app->getSecurity()->generatePasswordHash($model->pass);
                $model->pass = $hash;
                $model->save();
                $this->redirect(array('sklep/login'));
                
                return;
            }
        }
        return $this->render('rejestracja',
            array(
                'model'=>$model)
            );
    }

}

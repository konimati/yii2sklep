<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produkty".
 *
 * @property int $idProdukty
 * @property string $nazwa
 * @property string $opis
 * @property double $cena
 * @property string $data_dodania
 *
 * @property KategorieHasProdukty[] $kategorieHasProdukties
 * @property Obrazy[] $obrazies
 * @property ProduktyHasSmaki[] $produktyHasSmakis
 */
class Produkty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produkty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nazwa'], 'required'],
            [['opis'], 'string'],
            [['cena'], 'number'],
            [['data_dodania'], 'safe'],
            [['nazwa'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idProdukty' => 'Id Produkty',
            'nazwa' => 'Nazwa',
            'opis' => 'Opis',
            'cena' => 'Cena',
            'data_dodania' => 'Data Dodania',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategorieHasProdukties()
    {
        return $this->hasMany(KategorieHasProdukty::className(), ['idProdukty' => 'idProdukty']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObrazies()
    {
        return $this->hasMany(Obrazy::className(), ['idProdukty' => 'idProdukty']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduktyHasSmakis()
    {
        return $this->hasMany(ProduktyHasSmaki::className(), ['idProdukty' => 'idProdukty']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kategorie_has_produkty".
 *
 * @property int $idKategorieProduktow
 * @property int $idKategorie
 * @property int $idProdukty
 *
 * @property Kategorie $kategorie
 * @property Produkty $produkty
 */
class KategorieHasProdukty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kategorie_has_produkty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idKategorie', 'idProdukty'], 'required'],
            [['idKategorie', 'idProdukty'], 'integer'],
            [['idKategorie'], 'exist', 'skipOnError' => true, 'targetClass' => Kategorie::className(), 'targetAttribute' => ['idKategorie' => 'idKategorie']],
            [['idProdukty'], 'exist', 'skipOnError' => true, 'targetClass' => Produkty::className(), 'targetAttribute' => ['idProdukty' => 'idProdukty']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idKategorieProduktow' => 'Id Kategorie Produktow',
            'idKategorie' => 'Id Kategorie',
            'idProdukty' => 'Id Produkty',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategorie()
    {
        return $this->hasOne(Kategorie::className(), ['idKategorie' => 'idKategorie']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdukty()
    {
        return $this->hasOne(Produkty::className(), ['idProdukty' => 'idProdukty']);
    }
}

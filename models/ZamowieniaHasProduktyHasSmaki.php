<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zamowienia_has_produkty_has_smaki".
 *
 * @property int $idZamowieniaSmakowProduktow
 * @property int $idZamowienie
 * @property int $idSmaki_produktow
 * @property int $ilosc
 *
 * @property ProduktyHasSmaki $smakiProduktow
 * @property Zamowienia $zamowienie
 */
class ZamowieniaHasProduktyHasSmaki extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zamowienia_has_produkty_has_smaki';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idZamowienie', 'idSmaki_produktow'], 'required'],
            [['idZamowienie', 'idSmaki_produktow', 'ilosc'], 'integer'],
            [['idSmaki_produktow'], 'exist', 'skipOnError' => true, 'targetClass' => ProduktyHasSmaki::className(), 'targetAttribute' => ['idSmaki_produktow' => 'idSmaki_produktow']],
            [['idZamowienie'], 'exist', 'skipOnError' => true, 'targetClass' => Zamowienia::className(), 'targetAttribute' => ['idZamowienie' => 'idZamowienie']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idZamowieniaSmakowProduktow' => 'Id Zamowienia Smakow Produktow',
            'idZamowienie' => 'Id Zamowienie',
            'idSmaki_produktow' => 'Id Smaki Produktow',
            'ilosc' => 'Ilosc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmakiProduktow()
    {
        return $this->hasOne(ProduktyHasSmaki::className(), ['idSmaki_produktow' => 'idSmaki_produktow']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZamowienie()
    {
        return $this->hasOne(Zamowienia::className(), ['idZamowienie' => 'idZamowienie']);
    }
}

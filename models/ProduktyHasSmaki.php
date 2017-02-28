<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produkty_has_smaki".
 *
 * @property int $idSmaki_produktow
 * @property int $idProdukty
 * @property int $idSmaki
 *
 * @property Produkty $produkty
 * @property Smaki $smaki
 * @property ZamowieniaHasProduktyHasSmaki[] $zamowieniaHasProduktyHasSmakis
 */
class ProduktyHasSmaki extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produkty_has_smaki';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idProdukty', 'idSmaki'], 'required'],
            [['idProdukty', 'idSmaki'], 'integer'],
            [['idProdukty'], 'exist', 'skipOnError' => true, 'targetClass' => Produkty::className(), 'targetAttribute' => ['idProdukty' => 'idProdukty']],
            [['idSmaki'], 'exist', 'skipOnError' => true, 'targetClass' => Smaki::className(), 'targetAttribute' => ['idSmaki' => 'idSmaki']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idSmaki_produktow' => 'Id Smaki Produktow',
            'idProdukty' => 'Id Produkty',
            'idSmaki' => 'Id Smaki',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdukty()
    {
        return $this->hasOne(Produkty::className(), ['idProdukty' => 'idProdukty']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmaki()
    {
        return $this->hasOne(Smaki::className(), ['idSmaki' => 'idSmaki']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZamowieniaHasProduktyHasSmakis()
    {
        return $this->hasMany(ZamowieniaHasProduktyHasSmaki::className(), ['idSmaki_produktow' => 'idSmaki_produktow']);
    }
}

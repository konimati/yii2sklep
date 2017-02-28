<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "obrazy".
 *
 * @property int $idObrazy
 * @property string $url
 * @property int $idProdukty
 *
 * @property Produkty $produkty
 */
class Obrazy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'obrazy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idProdukty'], 'required'],
            [['idProdukty'], 'integer'],
            [['url'], 'string', 'max' => 255],
            [['idProdukty'], 'exist', 'skipOnError' => true, 'targetClass' => Produkty::className(), 'targetAttribute' => ['idProdukty' => 'idProdukty']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idObrazy' => 'Id Obrazy',
            'url' => 'Url',
            'idProdukty' => 'Id Produkty',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdukty()
    {
        return $this->hasOne(Produkty::className(), ['idProdukty' => 'idProdukty']);
    }
}

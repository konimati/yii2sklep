<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smaki".
 *
 * @property int $idSmaki
 * @property string $nazwa
 * @property int $ilosc
 *
 * @property ProduktyHasSmaki[] $produktyHasSmakis
 */
class Smaki extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smaki';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nazwa', 'ilosc'], 'required'],
            [['ilosc'], 'integer'],
            [['nazwa'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idSmaki' => 'Id Smaki',
            'nazwa' => 'Nazwa',
            'ilosc' => 'Ilosc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduktyHasSmakis()
    {
        return $this->hasMany(ProduktyHasSmaki::className(), ['idSmaki' => 'idSmaki']);
    }
}

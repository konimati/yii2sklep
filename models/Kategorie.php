<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kategorie".
 *
 * @property int $idKategorie
 * @property string $nazwa
 *
 * @property KategorieHasProdukty[] $kategorieHasProdukties
 */
class Kategorie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kategorie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nazwa'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idKategorie' => 'Id Kategorie',
            'nazwa' => 'Nazwa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategorieHasProdukties()
    {
        return $this->hasMany(KategorieHasProdukty::className(), ['idKategorie' => 'idKategorie']);
    }
}

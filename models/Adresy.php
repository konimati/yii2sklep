<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "adresy".
 *
 * @property int $idAdresy
 * @property string $imie
 * @property string $nazwisko
 * @property string $miejscowosc
 * @property string $ulica
 * @property string $nr_domu
 * @property string $nr_lokalu
 * @property string $kod_pocztowy
 * @property int $idUser
 *
 * @property Uzytkownicy $user
 */
class Adresy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'adresy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['imie', 'nazwisko', 'miejscowosc', 'ulica', 'nr_domu', 'kod_pocztowy', 'idUser'], 'required'],
            [['idUser'], 'integer'],
            [['imie', 'nazwisko', 'miejscowosc', 'ulica', 'nr_domu', 'nr_lokalu'], 'string', 'max' => 45],
            [['kod_pocztowy'], 'string', 'max' => 6],
            [['idUser'], 'unique'],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => Uzytkownicy::className(), 'targetAttribute' => ['idUser' => 'idUser']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idAdresy' => 'Id Adresy',
            'imie' => 'Imie',
            'nazwisko' => 'Nazwisko',
            'miejscowosc' => 'Miejscowosc',
            'ulica' => 'Ulica',
            'nr_domu' => 'Nr Domu',
            'nr_lokalu' => 'Nr Lokalu',
            'kod_pocztowy' => 'Kod Pocztowy',
            'idUser' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Uzytkownicy::className(), ['idUser' => 'idUser']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "uzytkownicy".
 *
 * @property int $idUser
 * @property string $user
 * @property string $pass
 * @property string $email
 * @property int $admin
 * @property string $data_dodania
 *
 * @property Adresy $adresy
 * @property Zamowienia[] $zamowienias
 */
class Uzytkownicy extends \yii\db\ActiveRecord 
{
    // public $username;
    // public $password;
    // public $email;
    // public $admin;
    // public $data_dodania;
    //public $verifyCode;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uzytkownicy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user', 'pass', 'email'], 'required'],
            [['admin'], 'integer'],
            [['data_dodania'], 'safe'],
            [['user'], 'string','min'=>5, 'max' => 45],
            [['pass'], 'string','min'=>5,'max' => 300],
            [['email'], 'email'],
            [['user'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUser' => 'Id User',
            'user' => 'User',
            'pass' => 'Pass',
            'email' => 'Email',
            'admin' => 'Admin',
            'data_dodania' => 'Data Dodania',
        ];
    }

    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdresy()
    {
        return $this->hasOne(Adresy::className(), ['idUser' => 'idUser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZamowienias()
    {
        return $this->hasMany(Zamowienia::className(), ['idUser' => 'idUser']);
    }
}

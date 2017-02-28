<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $idPost
 * @property string $nazwa
 * @property double $cena_przedplata
 * @property double $cena_pobranie
 * @property string $url
 * @property string $info
 *
 * @property Zamowienia[] $zamowienias
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nazwa', 'cena_przedplata', 'cena_pobranie', 'url'], 'required'],
            [['cena_przedplata', 'cena_pobranie'], 'number'],
            [['info'], 'string'],
            [['nazwa'], 'string', 'max' => 45],
            [['url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPost' => 'Id Post',
            'nazwa' => 'Nazwa',
            'cena_przedplata' => 'Cena Przedplata',
            'cena_pobranie' => 'Cena Pobranie',
            'url' => 'Url',
            'info' => 'Info',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZamowienias()
    {
        return $this->hasMany(Zamowienia::className(), ['post_idPost' => 'idPost']);
    }
}

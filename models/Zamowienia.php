<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zamowienia".
 *
 * @property int $idZamowienie
 * @property string $data
 * @property string $kwota
 * @property int $idUser
 * @property int $post_idPost
 *
 * @property Uzytkownicy $user
 * @property Post $postIdPost
 * @property ZamowieniaHasProduktyHasSmaki[] $zamowieniaHasProduktyHasSmakis
 */
class Zamowienia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zamowienia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data'], 'safe'],
            [['idUser', 'post_idPost'], 'required'],
            [['idUser', 'post_idPost'], 'integer'],
            [['kwota'], 'string', 'max' => 45],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => Uzytkownicy::className(), 'targetAttribute' => ['idUser' => 'idUser']],
            [['post_idPost'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_idPost' => 'idPost']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idZamowienie' => 'Id Zamowienie',
            'data' => 'Data',
            'kwota' => 'Kwota',
            'idUser' => 'Id User',
            'post_idPost' => 'Post Id Post',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Uzytkownicy::className(), ['idUser' => 'idUser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostIdPost()
    {
        return $this->hasOne(Post::className(), ['idPost' => 'post_idPost']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZamowieniaHasProduktyHasSmakis()
    {
        return $this->hasMany(ZamowieniaHasProduktyHasSmaki::className(), ['idZamowienie' => 'idZamowienie']);
    }
}

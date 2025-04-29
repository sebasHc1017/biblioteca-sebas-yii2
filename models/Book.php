<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Book extends ActiveRecord
{
    public static function tableName()
    {
        return 'book';
    }

    public function rules()
    {
        return [
            [['title', 'author', 'published_at'], 'required', 'message' => 'Este campo no puede estar vacío.'],
            [['published_at'], 'safe'],
            [['title', 'author'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Título',
            'author' => 'Autor',
            'published_at' => 'Fecha de Publicación',
        ];
    }
}

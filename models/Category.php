<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

class Category extends AbstractModel
{
    public static function tableName()
    {
        return '{{%category}}';
    }

    public function getProducts()
    {
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }
}
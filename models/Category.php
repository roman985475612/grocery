<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

class Category extends AbstractModel
{
    public static function tableName()
    {
        return '{{%category}}';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            ['parent_id', 'integer'],
            [['keywords', 'description'], 'string'],
        ];
    }

    public function getProducts()
    {
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }

    public function getParent()
    {
        return static::findOne($this->parent_id);
    }

    public static function getAllAsArray()
    {
        $result = static::find()
                        ->select(['id', 'title'])
                        ->indexBy('id')
                        ->asArray()
                        ->all();

        return ArrayHelper::map($result, 'id', 'title');

    }

    public static function remove($obj)
    {
        $childs = static::find()->where(['parent_id' => $obj->id])->all();
        if (!empty($childs)) {
            foreach ($childs as $child) {
                static::remove($child);
            }    
        }
        $obj->delete();
        Yii::$app->session->setFlash('success', 'Item #'.$obj->id.' has been deleted!');
    }
}
<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\data\Pagination;

class Product extends AbstractModel
{
    public static function tableName()
    {
        return '{{%product}}';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public static function getListByCategory($category)
    {
        $query = Product::find()->where(['category_id' => $category->id]);

        $pagination = new Pagination([
            'totalCount'     => $query->count(),
            'pageSize'       => 4,
            'forcePageParam' => false,
            'pageSizeParam'  => false,
        ]);

        $objects = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return [
            'objects'    => $objects,
            'pagination' => $pagination,
        ];
    }

    public static function getListBySearch($q)
    {
        $query = Product::find()->where(['like', 'title', $q]);

        $pagination = new Pagination([
            'totalCount'     => $query->count(),
            'pageSize'       => 4,
            'forcePageParam' => false,
            'pageSizeParam'  => false,
        ]);

        $objects = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return [
            'objects'    => $objects,
            'pagination' => $pagination,
        ];
    }

    public static function getOffers()
    {
        return Product::find()
        ->where(['is_offer' => 1])
        ->limit(4)
        ->all();
    }
}
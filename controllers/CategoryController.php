<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class CategoryController extends AppController
{
    public function actionView($id)
    {
        $category = Category::findOne($id);

        if (empty($category)) {
            throw new NotFoundHttpException('Категория не найдена!');
        }

        $query = Product::find()->where(['category_id' => $id]);

        $pagination = new Pagination([
            'totalCount'     => $query->count(),
            'pageSize'       => 4,
            'forcePageParam' => false,
            'pageSizeParam'  => false,
        ]);

        $products = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $this->setMeta($category->title, $category->keywords, $category->description);

        return $this->render('view', [
            'category' => $category,
            'products' => $products,
            'pagination' => $pagination,
        ]);
    }
}
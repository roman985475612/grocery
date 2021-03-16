<?php

namespace app\controllers;

use Yii;
use app\models\Category;
use app\models\Product;
use yii\helpers\Html;

class ProductController extends AppController
{
    public function actionIndex()
    {
        $data = Product::all();

        $this->setMeta('Branded Foods', 'Branded Foods', 'Branded Foods');

        return $this->render('list', [
            'category'   => 'Branded Foods',
            'products'   => $data['objects'],
            'pagination' => $data['pagination'],
            'topic'      => 'Branded Foods',
        ]);
    }

    public function actionList($id)
    {
        $category = Category::getObjectOr404($id, 'Категория не найдена!');

        $data = Product::getListByCategory($category);

        $this->setMeta($category->title, $category->keywords, $category->description);

        return $this->render('list', [
            'category'   => $category,
            'products'   => $data['objects'],
            'pagination' => $data['pagination'],
            'topic'      => $category->title,
        ]);
    }

    public function actionSearch()
    {
        $q = Yii::$app->request->get('q');
        $q = trim($q);

        if (empty($q)) {
            return $this->redirect(['home/index']);
        }

        $data = Product::getListBySearch($q);
        
        $this->setMeta("Поиск: {$q}");

        return $this->render('list', [
            'q'          => $q,
            'products'   => $data['objects'],
            'pagination' => $data['pagination'],
            'topic'      => "Поиск: " . Html::encode($q),
        ]);
    }

    public function actionDetail($id)
    {
        $product = Product::getObjectOr404($id, 'Такого продукта нет...');
        
        $this->setMeta($product->title, $product->keywords, $product->description);

        return $this->render('detail', compact('product'));
    }
}
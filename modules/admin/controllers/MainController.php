<?php

namespace app\modules\admin\controllers;

use app\models\User;
use app\models\Order;
use app\models\Product;
use app\models\Category;

class MainController extends AppAdminController
{
    public function actionIndex()
    {
        $user_count = User::find()->count();
        $order_count = Order::find()->count();
        $product_count = Product::find()->count();
        $category_count = Category::find()->count();

        $this->title = 'Admin';
        $this->breadcrumbs[] = 'Main';
        $this->setMeta('Admin', 'Admin page');
        
        return $this->render('index', compact('user_count', 'order_count', 'product_count', 'category_count'));
    }
}
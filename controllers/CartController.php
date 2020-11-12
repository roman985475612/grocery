<?php

namespace app\controllers;

use Yii;
use app\models\Cart;
use app\models\Product;

class CartController extends AppController
{

    public function actionShow()
    {
        $session = Yii::$app->session;
        $session->open();

        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('//layouts/inc/_cart-table', compact('session'));
        }
    }

    public function actionAdd($product_id)
    {
        $product = Product::findOne($product_id);
        
        if (empty($product)) {
            return false;
        }

        $session = Yii::$app->session;
        $session->open();

        Cart::add($product);

        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('//layouts/inc/_cart-table', compact('session'));
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionDestroy()
    {
        Cart::remove();

        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('//layouts/inc/_cart-table', compact('session'));
        }
    }
}
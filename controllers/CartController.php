<?php

namespace app\controllers;

use Yii;
use app\models\Cart;
use app\models\Product;

class CartController extends AppController
{

    public function actionShow()
    {
        $cart = Cart::getInstance();

        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('//layouts/inc/_cart-table', compact('cart'));
        }
    }

    public function actionAdd($product_id)
    {
        $product = Product::findOne($product_id);
        
        if (empty($product)) {
            return false;
        }

        $cart = Cart::getInstance();
        $cart->add($product);

        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('//layouts/inc/_cart-table', compact('cart'));
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionDelItem($id)
    {
        $cart = Cart::getInstance();
        $cart->delItem($id);

        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('//layouts/inc/_cart-table', compact('cart'));
        }
    }

    public function actionRemove()
    {
        $cart = Cart::getInstance();
        $cart->remove();

        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('//layouts/inc/_cart-table', compact('cart'));
        }
    }

    public function actionList()
    {
        $this->setMeta('Оформление заказа');

        return $this->render('list');
    }
}
<?php

namespace app\controllers;

use Yii;
use app\models\Cart;
use app\models\Order;
use app\models\OrderProduct;
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

    public function actionList()
    {
        $cart = Cart::getInstance();
        $order = new Order;
        
        if (Yii::$app->request->isPost) {
            if ($order->add($cart)) {
                Yii::$app->session->setFlash('success', 'Ваш заказ принят');
                $cart->remove();
                return $this->goHome();
            }
            
            Yii::$app->session->setFlash('error', 'Ошибка оформления заказа');
        }

        $this->setMeta('Оформление заказа');

        return $this->render('list', compact('cart', 'order'));
    }

    public function actionAdd($product_id)
    {
        $product = Product::findOne($product_id);
        if (empty($product)) {
            return false;
        }

        $cart = Cart::getInstance();
        $cart->createItem($product);
        $cart->add($product);

        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('//layouts/inc/_cart-table', compact('cart'));
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionQtyPlus($product_id)
    {
        $product = Product::findOne($product_id);
        if (empty($product)) {
            return false;
        }

        $cart = Cart::getInstance();
        $cart->add($product);

        if (Yii::$app->request->isAjax) {
            return json_encode($cart->all());
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionQtyMinus($product_id)
    {
        $product = Product::findOne($product_id);
        if (empty($product)) {
            return false;
        }

        $cart = Cart::getInstance();
        $cart->subtrack($product);

        if (Yii::$app->request->isAjax) {
            return json_encode($cart->all());
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionDelItem($product_id)
    {
        $cart = Cart::getInstance();
        $cart->delItem($product_id);

        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('//layouts/inc/_cart-table', compact('cart'));
        }

        return $this->render('list', compact('cart'));
    }

    public function actionRemove()
    {
        $cart = Cart::getInstance();
        $cart->remove();

        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('//layouts/inc/_cart-table', compact('cart'));
        }
    }
}
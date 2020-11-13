<?php

namespace app\models;

use Yii;

class Cart
{
    public static $instance = null;

    private function __construct() {
        $session = Yii::$app->session;
        $session->open();

        if (!$session->has('cart')) {
            $session['cart'] = new \ArrayObject;
        }

        if (!$session->has('cart.qty')) {
            $session['cart.qty'] = 0.00;
        }

        if (!$session->has('cart.sum')) {
            $session['cart.sum'] = 0.00;
        }
    }

    public function cart()
    {
        return Yii::$app->session->get('cart');
    }

    public function total_qty()
    {
        return Yii::$app->session->get('cart.qty');
    }

    public function total_sum()
    {
        return Yii::$app->session->get('cart.sum');
    }

    public static function getInstance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function createItem(Product $product)
    {
        if (!isset(Yii::$app->session['cart'][$product->id])) {
            Yii::$app->session['cart'][$product->id] = [
                'title' => $product->title, 
                'price' => $product->price,
                'img'   => $product->img,
                'qty'   => 0,
                'sum'   => 0,
            ];
        }
    }

    public function add(Product $product, int $qty = 1)
    {
        $this->createItem($product);

        $sum = $product->price * $qty;

        Yii::$app->session['cart'][$product->id]['qty'] += $qty;
        Yii::$app->session['cart'][$product->id]['sum'] += $sum;

        Yii::$app->session['cart.qty'] += $qty;
        Yii::$app->session['cart.sum'] += $sum;
    }

    public function delItem($product_id)
    {
        if (!isset(Yii::$app->session['cart'][$product_id]))
            return false;

        $qty = Yii::$app->session['cart'][$product_id]['qty'];
        $sum = Yii::$app->session['cart'][$product_id]['sum'];

        Yii::$app->session['cart.qty'] -= $qty;
        Yii::$app->session['cart.sum'] -= $sum;

        unset(Yii::$app->session['cart'][$product_id]);
    }

    public function remove()
    {
        Yii::$app->session->remove('cart');       
        Yii::$app->session->remove('cart.qty');       
        Yii::$app->session->remove('cart.sum'); 
    }
}
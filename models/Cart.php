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

    public function all()
    {
        $data['list'] = Yii::$app->session->get('cart');
        $data['total_qty'] = Yii::$app->session->get('cart.qty');
        $data['total_sum'] = Yii::$app->session->get('cart.sum');

        return $data;
    }

    public function list()
    {
        return Yii::$app->session->get('cart');
    }

    public function item($product_id)
    {
        return Yii::$app->session->get('cart')[$product_id];
    }

    public function total_qty()
    {
        return Yii::$app->session->get('cart.qty');
    }

    public function total_sum()
    {
        return Yii::$app->session->get('cart.sum');
    }

    public function total_count()
    {
        return count(Yii::$app->session->get('cart'));
    }

    public static function getInstance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function createItem(Product $product)
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
        $sum = $product->price * $qty;

        Yii::$app->session['cart'][$product->id]['qty'] += $qty;
        Yii::$app->session['cart'][$product->id]['sum'] += $sum;

        Yii::$app->session['cart.qty'] += $qty;
        Yii::$app->session['cart.sum'] += $sum;
    }

    public function subtrack(Product $product, int $qty = 1)
    {   
        if (Yii::$app->session['cart'][$product->id]['qty'] == 0)
            return null;

        $sum = $product->price * $qty;

        Yii::$app->session['cart'][$product->id]['qty'] -= $qty;
        Yii::$app->session['cart'][$product->id]['sum'] -= $sum;

        Yii::$app->session['cart.qty'] -= $qty;
        Yii::$app->session['cart.sum'] -= $sum;
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
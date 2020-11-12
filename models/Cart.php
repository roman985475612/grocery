<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Cart extends Model
{
    public static function add(Product $product, int $qty = 1)
    {
        $sum = $product->price * $qty;

        if (isset($_SESSION['cart'][$product->id])) {
            $_SESSION['cart'][$product->id]['qty'] += $qty;
            $_SESSION['cart'][$product->id]['sum'] += $sum;
        } else {
            $_SESSION['cart'][$product->id] = [
                'title' => $product->title, 
                'price' => $product->price,
                'img'   => $product->img,
                'qty'   => $qty,
                'sum'   => $sum,
            ];
        }

        if (isset($_SESSION['cart.qty'])) {
            $_SESSION['cart.qty'] += $qty;
        } else {
            $_SESSION['cart.qty'] = $qty;
        }

        if (isset($_SESSION['cart.sum'])) {
            $_SESSION['cart.sum'] += $sum;
        } else {
            $_SESSION['cart.sum'] = $sum;
        }


        $obj = new static();

        return $obj;
    }

    public static function remove()
    {
        $session = Yii::$app->session;
        $session->remove('cart');       
        $session->remove('cart.qty');       
        $session->remove('cart.sum');       
    }
}
<?php

namespace app\models;

class OrderProduct extends AbstractModel
{
    public static function tableName()
    {
        return '{{%order_product}}';
    }

    public function rules()
    {
        return [
            [['order_id', 'product_id', 'title', 'price', 'qty', 'total'], 'required'],
            [['order_id', 'product_id', 'qty'], 'integer'],
            [['price', 'total'], 'number'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public static function add($order_id, $products)
    {
        $obj = new static;
        
        foreach ($products as $id => $product) {
            $obj->isNewRecord = true;
            $obj->id          = null;
            $obj->order_id    = $order_id;
            $obj->product_id  = $id;
            $obj->title       = $product['title'];
            $obj->price       = $product['price'];
            $obj->qty         = $product['qty'];
            $obj->total       = $product['sum'];
            
            if (!$obj->save()) {
                return false;
            }
        }

        return true;
    }
}
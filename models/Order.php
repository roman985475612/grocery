<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

class Order extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%orders}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'address'], 'required'],
            ['note', 'string'],
            ['email', 'email'],
            [['created_at', 'updated_at'], 'safe'],
            ['qty', 'integer'],
            ['total', 'number'],
            ['status', 'boolean']
        ];
    }

    public function attributeLabels()
    {
        return [
            'name'    => 'Имя',
            'email'   => 'E-mail',
            'phone'   => 'Телефон',
            'address' => 'Адрес',
            'note'    => 'Комментарий',
        ];
    }

    public function add($cart)
    {
        if ($this->load(Yii::$app->request->post())) {
            $this->qty   = $cart->total_qty(); 
            $this->total = $cart->total_sum();

            $transaction = Yii::$app->getDb()->beginTransaction();

            if ($this->save() && OrderProduct::add($this->id, $cart->list())) {
                $transaction->commit();
                return true;
            }

            $transaction->rollBack();       
            
            return false;         
        }
    }
}
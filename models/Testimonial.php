<?php
namespace app\models;

use yii\db\ActiveRecord;


class Testimonial extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%testimonials}}';
    }

    public static function getList()
    {
        $result = [];

        $testimonials = static::find()->all();

        $i = 0;
        $couple = [];
        foreach($testimonials as $testimonial) {
            $el = [
                'name' => $testimonial->name,
                'position' => $testimonial->position,
                'description' => $testimonial->description,
            ];

            $couple[$i] = $el;

            if($i == 0) {
                $i = 1;
            } else {
                $result[] = $couple;
                $couple = [];
                $i = 0;
            } 
        }

        return $result;
    }
}
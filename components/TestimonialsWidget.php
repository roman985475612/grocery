<?php

namespace app\components;

use Yii;
use app\models\Testimonial;
use yii\base\Widget;

class TestimonialsWidget extends Widget
{
    public function run()
    {
        $html = Yii::$app->cache->get('testimonials');

        if (!$html) {
            $testimonials = Testimonial::getList();
            $html = $this->render('testimonials', compact('testimonials'));
            Yii::$app->cache->set('testimonials', $html, 60);
        }

        return $html;
    }
}
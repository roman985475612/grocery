<?php

namespace app\components;

use Yii;
use app\models\Product;
use yii\base\Widget;

class OfferWidget extends Widget
{
    public function run()
    {
        $html = Yii::$app->cache->get('offers');

        if (!$html) {
            $offers = Product::getOffers();
            $html = $this->render('offer', compact('offers'));
            Yii::$app->cache->set('offer', $html, 60);
        }

        return $html;
    }
}
<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

abstract class AbstractModel extends ActiveRecord
{
    public static function getObjectOr404($id, $errorString)
    {
        $obj = static::findOne($id);

        if (empty($obj)) {
            throw new NotFoundHttpException($errorString);
        }

        return $obj;
    }
}
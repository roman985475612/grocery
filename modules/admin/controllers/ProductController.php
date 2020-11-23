<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Category;
use app\models\Product;

class ProductController extends AppAdminController
{
    public function actionIndex()
    {
        $model = Product::all();

        $this->title = 'Products';
        $this->breadcrumbs['/admin'] = 'Main';
        $this->breadcrumbs[] = $this->title;

        return $this->render('index', compact('model'));
    }

    public function actionView($id)
    {
        $model = Product::find()->where(['id' => $id])->asArray()->all()[0];
        if (Yii::$app->request->isAjax) {
            return json_encode($model);
        }
    }

    public function actionCreate()
    {
        $model = new Product;
        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Item #'.$model->id.' has been created!');
                return true;
            }
        }
        $categories = Category::getAllAsArray();
        return $this->renderPartial('form', compact('model', 'categories'));
    }

    public function actionEdit($id)
    {
        $model = Product::findOne($id);
        if (Yii::$app->request->isPost) {
            $model->old_img = $model->img;
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Item #'.$model->id.' has been updated!');
                return true;
            }
        }
        $categories = Category::getAllAsArray();
        return $this->renderPartial('form', compact('model', 'categories'));
    }

    public function actionDelete($id)
    {
        if (Yii::$app->request->isPost) {
            $model = Product::findOne($id);
            $model->delete();
            Yii::$app->session->setFlash('success', 'Item #'.$id.' has been deleted!');
        }
    }
}
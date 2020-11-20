<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Category;

class CategoryController extends AppAdminController
{
    public function actionIndex()
    {
        $categories = Category::find()->all();

        $this->title = 'Categories';
        $this->breadcrumbs['/admin'] = 'Main';
        $this->breadcrumbs[] = 'Categories';

        return $this->render('index', compact('categories'));
    }

    public function actionView($id)
    {
        $model = Category::find()->where(['id' => $id])->asArray()->all()[0];
        if (Yii::$app->request->isAjax) {
            return json_encode($model);
        }
    }

    public function actionCreate()
    {
        $model = new Category;
        
        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Item #'.$model->id.' has been created!');
                return true;
            }
        }

        $parents = Category::find()->all();
        return $this->renderPartial('form', compact('model', 'parents'));
    }

    public function actionEdit($id)
    {
        $model = Category::findOne($id);
        $parents = Category::find()->all();
        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Item #'.$model->id.' has been updated!');
                return true;
            }
        }
        return $this->renderPartial('form', compact('model', 'parents'));
    }

    public function actionDelete($id)
    {
        if (Yii::$app->request->isPost) {
            $model = Category::findOne($id);
            Category::remove($model);
        }
    }
}
<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Order;

class OrderController extends AppAdminController
{
    public function actionIndex()
    {
        $orders = Order::find()->all();

        $this->title = 'Orders';
        $this->breadcrumbs['/admin'] = 'Main';
        $this->breadcrumbs[] = 'Orders';
        $this->setMeta('Orders Order', 'Orders list page');

        return $this->render('index', compact('orders'));
    }

    public function actionView($id)
    {
        $order = Order::find()->where(['id' => $id])->asArray()->all()[0];
        if (empty($order)) {
            return $this->redirect('order/index');
        }

        $data = json_encode($order);

        if (Yii::$app->request->isAjax) {
            return $data;
        }

        return $this->render('view', compact('data'));
    }

    public function actionEdit($id)
    {
        $order = Order::findOne($id);
        if (empty($order)) {
            return $this->redirect('order/index');
        }

        if (Yii::$app->request->isPost) {
            if ($order->load(Yii::$app->request->post()) && $order->save()) {
                return true;
            }
        }

        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('edit', compact('order'));
        }

        return $this->render('edit', compact('order'));
    }

    public function actionDelete($id)
    {
        if (Yii::$app->request->isPost) {
            $order = Order::findOne($id);
            if (!empty($order)) {
                $order->remove();
                return 'OK';
            }
            return 'Err';
        }
        return $this->redirect('/admin/orders');
    }
}
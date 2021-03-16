<?php

namespace app\controllers;

class HomeController extends AppController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAbout()
    {
        $this->setMeta('About us', 'About us', 'About us');
        return $this->render('about', ['topic' => 'About us']);
    }

    public function actionContact()
    {
        $this->setMeta('Mail Us', 'Mail Us', 'Mail Us');
        return $this->render('contact', ['topic' => 'Mail Us']);
    }

    public function actionEvents()
    {
        $this->setMeta('Events', 'Events', 'Events');
        return $this->render('events', ['topic' => 'Events']);
    }

    public function actionServices()
    {
        $this->setMeta('Services', 'Services', 'Services');
        return $this->render('services', ['topic' => 'Services']);
    }

    
}
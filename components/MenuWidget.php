<?php

namespace app\components;

use yii\base\Widget;

class MenuWidget extends Widget
{
    public string $tpl = '';
    public string $ul_class = '';
    public string $data;
    public string $tree;
    public string $menuHtml;

    public function init()
    {
        parent::init();
        
        if ($this->ul_class === null) {
            $this->ul_class = 'menu';
        }

        if ($this->tpl === null) {
            $this->tpl = 'menu';
        }

        $this->tpl .= '.php';
    }

    public function run(): string
    {
        return $this->tpl;
    }
}
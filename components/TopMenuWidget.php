<?php

namespace app\components;

use yii\base\Widget;
use app\models\Categories;
use Yii;

class TopMenuWidget extends Widget
{
    public $tpl;
    public $data;
    public $tree;
    public $menuHtml;

    public function init()
    {
        parent::init();
        if( $this->tpl === null)
        {
            $this->tpl = 'top';
        }
        $this->tpl .= '.php';
    }

    public function run()
    {
//        // get cache
//        $menu = Yii::$app->cache->get('menu');
//        if($menu) return $menu;

        $this->data = Categories::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
        //set cache
//        Yii::$app->cache->set('menu', $this->menuHtml, 60);
        return $this->menuHtml;
    }

    protected function getTree()
    {
        $tree = [];
        foreach ($this->data as $id=>&$node) {
            if(!$node['parentid'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parentid']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }

    protected function getMenuHtml($tree)
    {
        $str ='';
        foreach ($tree as $category)
        {
            $str .= $this->catToTemplate($category);
        }
        return $str;
    }

    protected function catToTemplate($category)
    {
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

}
<?php
use Phalcon\Mvc\View\Simple;

/**
 * Created by PhpStorm.
 * User: yibeel
 * Date: 17/7/11
 * Time: 下午5:40
 */
class viewController extends Simple
{

    private $_view;

    public function setView()
    {
        $di = ($this->getDI());
        $this->_view = $di['view'];

        return $this;
    }

    public function login()
    {
        print_r($this->request->getPost());
    }

    public function index()
    {
        $params = [
            "brand_title" => " LEMENTARY DESIGN",
            "title" => "首页",
            "brand_title_cn" => "欢迎来到校园湃",
            "brand_content" => "中国唯一一个服务报销社团活动的专业网站 -- 发布活动 来校园湃"
        ];

        $this->_render('index/index', $params);

    }

    private function _render($route, array $params)
    {
        echo $this->_view->render($route, $params);
    }

}
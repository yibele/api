<?php


class IndexController extends ControllerBase{

    public function index (){
        echo '111111111';
        $this->view->render('index/index');
    }
    
}

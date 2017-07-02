<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{

    /**
     * @param $code 输入的时间代码
     * @param $msg  提示信息
     * @param null $data 返回的数据
     */
    protected function _msg($code, $msg, $data = null)
    {
        $msg = [
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        ];
        $this->response->setJsonContent($msg);
        $this->response->send();
    }

}

<?php

/**
 * Created by PhpStorm.
 * User: yibeel
 * Date: 17/6/30
 * Time: 上午11:22
 */
class ActivityController extends ControllerBase
{
    private $_activity;

    /**
     * @return \Phalcon\Http\Response|\Phalcon\Http\ResponseInterface
     */
    public function create()
    {
        $post = $this->request->getPost();

        if (!isset($this->_activity)) {
            $activity = new Activity();
        } else {
            $activity = $this->_activity;
        }

        //获取用户是否已经创建过活动
        $acts = $activity::query()
            ->where("act_user = '" . $post['act_user'] . "'")
            ->andWhere("act_finished =0 ")
            ->execute();

        //如果创建 ， 返回错误
        if (count($acts) >= 1) {
            $msg = [
                'code' => 40002,
                'msg' => '目前一个用户同时只能创建一个活动'
            ];
            $this->response->setStatusCode(501)->setJsonContent($msg);
            return $this->response;

        } else {
            //如果没有创建国， 那么创建活动
            if ($activity->save($post)) {
                $this->_msg(10002, '创建用户成功', $post);
            } else {
                $this->_msg(40002, '创建活动失败');
            };
        }
    }

    //获取首页活动信息
    public function getIndexAct()
    {
        $di = $this->getDi();
        $db = $di['db'];
        $arr = array();
        $res = Activity::getIndexAct(5, null);
        $this->_msg(200,10004,'获取首页活动成功',$res);

    }
}
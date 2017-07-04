<?php

/**
 * Created by PhpStorm.
 * User: yibeel
 * Date: 17/6/30
 * Time: 上午11:21
 */
class UserController extends ControllerBase
{
    //用户数据
    private $_user = array();

    //用户参加的活动列表
    private $_act = array();

    //用户活动表数据
    private $_UserAct;


    //创建用户
    public function create()
    {
        $user = new User();

        $post = $this->request->getPost();

        /**
        $user->nickName = $post['nickName'];
        $user->avatarUrl = $post['avatarUrl'];
        $user->gender = $post['gender'];
        $user->phone = $post['phone'];
         */

        if($user->save($post) ===false) {
            $msg = [
                'code'=> 40003,
                'msg' => '创建数据失败'
            ];
            $this->response->setStatusCode(504);
            $this->response->setJsonContent($msg);
            $this->response->send();
        } else {
            $msg = [
                'code'=> 10001,
                'data' => [
                    'uid' => "$user->user_id"
                ],
                'msg'=> '创建用户成功'
            ];
            $this->response->setStatusCode(200,'ok');
            $this->response->setJsonContent($msg);
            $this->response->send();
        }

    }

    //通过用户名获取用户数据和用户所参加的活动
    public function findByName($nickName)
    {
        //从数据库中获取$nickName的数据。
        $user = User::findFirst("nickName='" . $nickName . "'");
        if ($user) {
            //初始化 UserAct
            $UserAct = $user->getUserAct();
            $this->_UserAct = $UserAct;
            //初始化 act
            $activity = array();
            foreach ($UserAct as $act) {
                $this->_act[] = $act->Activity;
                $activity[] = $act->Activity->toArray();
            }

            $this->_user = $user;

            $msg = [
                'code'=> 200,
                'data'=> [
                    'user' => $user->toArray(),
                    'act' => $activity,
                    'actCount' => count($activity)
                ],
                'msg'=>'success'
            ];

            $this->response->setStatusCode(200,'ok');
            $this->response->setJsonContent($msg);
            $this->response->send();

        } else {

            $msg = [
                'code' => 40001,
                'msg'=> '用户名不存在'
            ];

            $this->response->setStatusCode(405,'nickName dose not exits');
            $this->response->setJsonContent($msg);
            $this->response->send();

        }
    }

    public function userAddAct($userId,$actId){
        $UserAct = new UserAct();
        $count = $UserAct::find("user_id = '".$userId."'");
        $count = count($count);
        if($count <=2) {
            $UserAct->act_id = $actId;
            $UserAct->user_id = $userId;
            $UserAct->save();
            $this->_msg(10003,'参加活动成功');
        } else {
            $this->_msg(40004,'用户最多只可参加两个活动');
        }
    }
}

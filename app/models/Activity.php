<?php

/**
 * Created by PhpStorm.
 * User: yibeel
 * Date: 17/6/30
 * Time: 下午1:03
 */
use Phalcon\Mvc\Model;
class Activity extends Model
{
    public $id;

    public $act_name;

    public $act_tag;

    public $act_comment;

    public $act_time;

    public $act_left_user;

    public $act_now_user;

    public $act_active;

    public $act_finished;

    public $created_at;

    public $act_location;

    public $act_user;

    public function initialize()
    {
        $this->hasMany(
            'id',
            'UserAct',
            'act_id'
        );
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: yibeel
 * Date: 17/6/30
 * Time: 下午1:04
 */
use Phalcon\Mvc\Model;
class UserAct extends Model
{
    public $id;

    public $user_id;

    public $act_id;

    public $created_at;

    public function initialize()
    {
        $this->belongsTo(
            'user_id',
            'User',
            'user_id'
        );
        $this->belongsTo(
            'act_id',
            'Activity',
            'id'
        );
    }
}
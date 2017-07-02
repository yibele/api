<?php

/**
 * Created by PhpStorm.
 * User: yibeel
 * Date: 17/6/30
 * Time: 下午1:00
 */
use Phalcon\Mvc\Model;

class User extends Model
{

    public $user_id;

    public $nickName;

    public $avatarUrl;

    public $phone;

    public $gender;

    public function initialize()
    {
        $this->hasMany(
            'user_id',
            'UserAct',
            'user_id'
        );
    }

    public function validation()
    {
        $validator = new \Phalcon\Validation();

        $validator->add(
            'nickName',
            new \Phalcon\Validation\Validator\Uniqueness([
                "messages" => 'nickName must be unique',
            ])
        );

        return $this->validate($validator);
    }

}
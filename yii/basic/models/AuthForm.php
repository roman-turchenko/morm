<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 23.12.2015
 * Time: 1:36
 */

// set namespace for our AuthForm model
namespace app\models;

class AuthForm extends \yii\base\Model
{
    public $username;
    public $password;

/*
 * This method creates rules for both, server side and client side validations
 */
    public function rules(){
        return [
            // define validation rules
            [['username', 'password'], 'required'],
            [['username', 'password'], 'trim']
        ];
    }
}
<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id_user
 * @property string $login_user
 * @property string $password_user
 * @property string $email_user
 * @property integer $superuser
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login_user', 'password_user', 'email_user', 'superuser'], 'required'],
            [['superuser'], 'integer'],
            [['login_user', 'password_user'], 'string', 'max' => 50],
            [['email_user'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'login_user' => 'Login User',
            'password_user' => 'Password User',
            'email_user' => 'Email User',
            'superuser' => 'Superuser',
        ];
    }
}

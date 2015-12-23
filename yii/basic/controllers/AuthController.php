<?php

namespace app\controllers;

use app\models\AuthForm;

class AuthController extends \yii\web\Controller
{
    public $layout = 'auth';

    public function actionIndex()
    {
        // create instance of app\models\AuthForm
        $model = new AuthForm();

        // Load data to the model for server side validation
        $model->load(\Yii::$app->request->post());
        if ($model->validate()){
            print "validated ".$model->username.' '.$model->password;
        }else{
            print "not validated";
        }


        // push the model instance to the view
        return $this->render('index', [
            'model' => $model
        ]);
    }

}

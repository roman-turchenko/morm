<?php
/**
 * Created by PhpStorm.
 * User: roman.turchenko
 * Date: 01.07.14
 * Time: 11:31
 */
class authController extends classController{

    function __construct(){

        $this->set_View_folder('auth');
    }

    public function mainAction(){

        $login = $password = "";

        if( check_RequestMethod() && count($_POST) > 0 ){

            $login    = trim($_POST['login']);
            $password = trim($_POST['password']);

            if( empty($login) )    authModel::$errors[] = 'Empty login';
            if( empty($password) ) authModel::$errors[] = 'Empty password';

            if( !count(authModel::$errors) )
                $this->Authorize( $login, $password );
        }

        echo $this->render_main(array(
            'errors'    => authModel::$errors,
            'user_data' => array('login' => $login),
        ));
    }

    public function logoutAction(){

        setcookie('PHPSESSID', '', time() - 1000);
        session_destroy();

        header("Location: ".$this->makeURI());
        die();
    }

    private function Authorize( $login, $password ){

        if (authModel::checkInBase($login, $password)){

            classModel::setSession(array(
                'login'   => true
            ));

            // set loggined user data
            authModel::$userData = usersModel::getUser(
                "login_user = '".classModel::escapeString($login)."' AND ".
                "password_user = '".md5(classModel::escapeString($password))."'"
            );

            // write to session
            classModel::setSession(array(
                'userData' => authModel::$userData
            ));

            // go to main admin page
            header("Location: ".$this->makeURI(array(
                    'controller' => 'archive')));
            exit();
        }else
            authModel::$errors[] = 'Wrong login\password';

        return null;
    }
}
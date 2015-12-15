<?php
/**
 * Created by PhpStorm.
 * User: roman.turchenko
 * Date: 01.07.14
 * Time: 11:32
 */
class authModel extends classModel{

    public static $logoutLink;

    function __construct(){

    }

    /**
     * @param $login
     * @param $password
     * @return int
     * Check login\password pare in base
     */
    public static function checkInBase( $login, $password ){
        return userModel::checkInBase( $login, $password );
    }

    public static function is_SuperUserSession(){
        $curent_user = parent::getSession('curent_user');
        return ( $curent_user['superuser'] == 1 );
    }

    public static function is_Authorized(){
        return ( parent::getSession('login') === true );
    }

    public static function getCurrentUserId(){
        // get curent user data
        $user_data = parent::getSession('curent_user');
        $_get_id_user = isset($_GET['id_user']) ? $_GET['id_user'] : null;
        $_post_id_user = isset($_POST['id_user']) ? $_POST['id_user'] : null;
        return
            self::is_SuperUserSession()
                ? ($_post_id_user ? $_post_id_user : ( $_get_id_user ? $_get_id_user : $user_data['id_user'] ))
                : parent::getSession('id_user');
    }
}
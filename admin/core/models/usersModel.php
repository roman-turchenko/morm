<?
class usersModel extends classModel{

    // get user data api link
    public static $apiGetUserData;
    // perform form link
    public static $urlPerformForm;

    // table
    private static $table = "users";

    function __construct(){}

    public static function getUsers($order = "id_user"){
        $sql = "SELECT * FROM ".self::$table.($order ? " ORDER BY ".$order : "");
        return parent::getAssocArray(parent::query($sql));
    }

    public static function getUser($condition){
        $sql = "SELECT * FROM ".self::$table." WHERE ".$condition;
        $userData = parent::fetchAssoc(parent::query($sql));
        unset($userData["password_user"]);
        return $userData;
    }

    public static function checkInBase( $login, $password ){
        return parent::checkInTable(
            self::$table,
            "login_user = '".parent::escapeString($login)."' AND ".
            "password_user = '".md5(parent::escapeString(($password)))."'"
        ) !== 0;
    }

    public static function createUser($data){
        $sql =
            "INSERT INTO ".self::$table." SET ".
            "email_user = '".parent::escapeString($data['email_user'])."',".
            "login_user = '".parent::escapeString($data['login_user'])."',".
            "password_user = '".md5(parent::escapeString($data['login_user']))."'";

        print $sql;

        parent::query($sql);
        return parent::queryError();
    }

    public static function updateUser($data){

    }
}
?>
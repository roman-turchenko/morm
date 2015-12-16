<?
class usersModel extends classModel{

    // list of users
    public static $usersList = array();

    function __construct(){

	}

    public static function getUsers(){
        $sql = "SELECT * FROM users ORDER BY id_user";
        self::$usersList = parent::fetchAssoc(parent::query($sql));
        return;
    }
}
?>
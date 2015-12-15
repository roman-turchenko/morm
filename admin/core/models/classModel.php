<?
class classModel{

    public static  $action = null;
    public static  $controller = null;
    public static  $errors = array();
    public static  $messages = array();

    function __construct(){

    }

//  ++++ MySql
    /**
     * @param $sql
     * @return bool|mysqli_result
     */
    public static function query( $sql ){
        return DB::getInstance()->query( $sql );
    }

    public static function fetchAssoc( $res ){
        return DB::getInstance()->fetchAssoc( $res );
    }

    public static function escapeString( $string ){
        return DB::getInstance()->escapeString( $string );
    }

    public static function numRows( $res ){
        return DB::getInstance()->numRows( $res );
    }

    public static function insertID(){
        return DB::getInstance()->insertID();
    }

    public static function queryError(){
        return DB::getInstance()->queryError();
    }



//  ++++ SESSION
    public static function setSession($key, $value = ''){
        if( is_array($key) ) foreach( $key as $k => $v )
            $_SESSION[$k] = $v;
        else
            $_SESSION[$key] = $value;

        return null;
    }

    public static function unsetSession( $key ){

        if( is_array($key) ) foreach( $key as $v ) unset($_SESSION[$v]);
        else
            unset($_SESSION[$key]);
        return null;
    }

    public static function getSession( $key ){

        $result = null;
        if( is_array($key) ){
            foreach( $key as $v ) $result[] = isset($_SESSION[$v]) ? $_SESSION[$v] : null;
        }
        else
            $result = isset($_SESSION[$key]) ? $_SESSION[$key] : null;

        return $result;
    }
}
?>
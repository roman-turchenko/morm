<?php
/**
 * Created by PhpStorm.
 * User: roman.turchenko
 * Date: 26.06.14
 * Time: 17:31
 */
class classController extends classView{

    public $add_id_user_to_links = false;
    public $instances = array();

    function __construct(){

        // set logout link
        authModel::$logoutLink = $this->makeURI(array("controller" => "auth", "action" => "logout"));

        // check logining
        if (!authModel::is_Authorized()){
            header("Location: ".$this->makeURI(array("controller" => "auth")));
        }
    }

    public function makeURI( $data = array() ){

        $result = array();

        if( empty($data['controller']) && $data['controller'] !== false )
            $data = array_merge(array('controller' => str_replace('Controller', '', get_class($this))), $data);

        if( is_array($data) ) foreach( $data as $k => $v ){
            $result[] = $k.'='.$v;
        }

        // add user information if superuser
        /*
        if( authModel::is_SuperUserSession() )
            $result[] = 'id_user='.classModel::getCurrentUserId();
*/
    return APP_ROOT_URL.(count($result) > 0 ? '?'.implode('&', $result) : '');
    }

    public static function st_makeURI( $data ){
        return self::makeURI( $data );
    }

    public function getInstance( $name ){

        if( !is_object($this->instances[$name]) )
            $this->instances[$name] = new $name();

        return $this->instances[$name];
    }

}
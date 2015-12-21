<?
class usersController extends classController{

	function __construct(){
		parent::__construct();
		$this->set_View_folder('users');

		usersModel::$apiGetUserData = $this->makeURI(array(
			"controller" => "users",
			"action" => "getData"
		));

        usersModel::$urlPerformForm = $this->makeURI(array(
            "controller" => "users",
            "action" => "performForm"
        ));
	}


//+ Public section

	public function mainAction(){

		$content = null;

        usersModel::getUsers();
		echo $this->render_main_admin(array(
			"content" => $this->render("main", array(usersModel::$usersList))
		));

		return;
	}

	public function getDataAction(){

		$result = array();

		if (check_RequestMethod()){

			if ($this->checkData($_POST)){

				$result['data'] = usersModel::getUser("id_user = '".usersModel::escapeString($_POST['id_user'])."'");

			}else{
				$result['errors'] = usersModel::$errors;
			}

			set_Json_header();
			print json_encode($result);
			exit();
		}else
			_404();

		return;
	}

    public function performFormAction(){

        $result = array();

        if (check_RequestMethod()){

            if ($this->checkData($_POST)){

                if ($_POST['id_user'] == "new"){

                    $user_data = usersModel::getUser("login_user = '".usersModel::escapeString($_POST['login_user'])."'");


                    print usersModel::createUser($_POST);


                }else{
                    usersModel::updateUser($_POST);
                }

            }else{
                $result['errors'] = usersModel::$errors;
            }

            set_Json_header();
            print json_encode($result);
            exit();
        }else
            _404();
    }


//+ Private section

	private function checkData(&$data){

		$data = parent::preparePost($data);

        if ($data['id_user'] !== "new")
            if (isset($data['id_user']) && !is_numeric($data['id_user']))
                usersModel::$errors[] = "Incorrect user id";

        if (empty($data['login_user']))
            usersModel::$errors[] = "Empty user login";
        elseif (strlen($data['login_user']) < 4)
            usersModel::$errors[] = "User login to short. Use at least 4 characters.";


        if ($data['id_user'] == "new"){
            if (empty($data['password']))
                usersModel::$errors[] = "Empty user's password";
        }

        if (!empty($data['password']) && $data['password'] !== $data['confirmPassword'])
            usersModel::$errors[] = "Password and confirm password don't match";

		return count(usersModel::$errors) === 0;
	}
}
?>

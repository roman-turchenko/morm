<?
class usersController extends classController{

	function __construct(){
		parent::__construct();
		$this->set_View_folder('users');

		usersModel::$apiGetUserData = $this->makeURI(array(
			"controller" => "users",
			"action" => "getData"
		));
	}


//+ Public section

	public function mainAction(){

		$content = null;

		switch (classModel::$action){
			default:
				usersModel::getUsers();
				// /users/main view
				$content = $this->render("main", array(usersModel::$usersList));
				break;
		}


		echo $this->render_main_admin(array(
			"content" => $content
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


//+ Private section

	private function checkData(&$data){

		$data = parent::preparePost($data);

		if (isset($data['id_user']) && !is_numeric($data['id_user']))
			usersModel::$errors[] = "Incorrect user id";

		return count(usersModel::$errors) === 0;
	}
}
?>

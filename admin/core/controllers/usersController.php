<?
class usersController extends classController{

	function __construct(){
		parent::__construct();
		$this->set_View_folder('users');
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


//+ Private section
}
?>

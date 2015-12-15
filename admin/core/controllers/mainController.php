<?
class mainController extends classController{

	function __construct(){
		$this->set_View_folder('main');
	}	
	
	
//+ Public section
	
	public function mainAction(){

		if (authModel::is_Authorized()){
            // go to main page in admin
            header("Location: ".$this->makeURI(array("controller" => "archive")));
		}else{
			// go to authorize form
			header("Location: ".$this->makeURI(array("controller" => "auth")));
		}

		exit();
	}


//+ Private section
}
?>

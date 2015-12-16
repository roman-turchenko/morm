<?
class broadcastController extends classController{

	function __construct(){
		parent::__construct();
		$this->set_View_folder('broadcast');
	}	
	
	
//+ Public section
	
	public function mainAction(){

		echo $this->render_main_admin(array(
			// /broadcast/main view
			"content" => $this->render("main", array(

			))
		));

		return;
	}


//+ Private section
}
?>

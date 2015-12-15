<?
class archiveController extends classController{

    function __construct(){
        parent::__construct();
        $this->set_View_folder('archive');
	}	
	
	
//+ Public section
	public function mainAction( $content = 'Hello!' ){

        // /common/admin.php view
        echo $this->render_main_admin(array(
            // /archive/main view
            "content" => $this->render("main", array(

            ))
        ));
        return;
	}
}
?>

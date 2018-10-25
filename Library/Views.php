<?php 

class Views {

	function __construct(){

	}

	function render($controller,$view){
		$controllers = get_class($controller);
		require VIEWS.DFT."head.php";
		require VIEWS.DFT."menu_superior.php";
		require VIEWS.DFT."menu_lateral.php";
		require VIEWS.$controllers."/".$view.".php";
		require VIEWS.DFT."footer.php";

	}

	function renderLogin($controller,$view){
		$controllers = get_class($controller);
		require VIEWS.DFT."head.php";
		require VIEWS.$controllers."/".$view.".php";
		require VIEWS.DFT."footer.php";

	}

	

}

?>
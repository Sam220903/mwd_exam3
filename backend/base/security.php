<?php
	function security(){
		if (session_status() === PHP_SESSION_NONE) {
			if(isset($_SESSION["request_key"])){
				$array=array();
				$array['status']	=	500;
				$array['error']   	=	"Error de seguridad";
				$array=json_encode($array);
				echo $array;
				die();
			}
		}
	}
	security();
?>
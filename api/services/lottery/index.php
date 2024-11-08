<?php
	$config	='lottery/configLottery.php';
	include_once '../../base/header.php';
	
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
            $numCards = isset($_GET['numCards']) ? $_GET['numCards'] : null;
            $cardID = isset($_GET['cardID']) ? $_GET['cardID'] : null;
            $conn = connection($connection);
            $res = getLottery($conn, $numCards, $cardID);
            $array = array();
            $array['status'] = 200;
            $array['error'] = false;
            $array['data'] = json_decode($res);
            $array=json_encode($array);
            echo $array;
            die();
        break;

        case 'POST':
            if($data = json_decode(file_get_contents("php://input"))){
				$conn  = connection($connection);
				$res  = insertCard($conn,$data);
				$array = array();
				$array['status'] = 200;
				$array['error'] = false;
				$array['data'] = json_decode($res);
				$array=json_encode($array);
				echo $array;
				die();
			}else{
				$array=array();
				$array['status'] = 400;
				$array['error'] = "Error de datos";
				$array['data'] = "";
				$array=json_encode($array);
				echo $array;
				die();
			}
        break;
        default: break;
    }
                    
?>
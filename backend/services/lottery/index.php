<?php
	$config	='lottery/configLottery.php';
	include_once '../../base/header.php';
	
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
            if($data = json_decode(file_get_contents("php://input"))){
                $numCards = isset($data->numCards) ? $data->numCards : null;
                $cardID = isset($data->cardID) ? $data->cardID : null;
                $conn = connection($connection);
                $res = getLottery($conn, $numCards, $cardID);
                $array = array();
                $array['status'] = 200;
                $array['error'] = false;
                $array['data'] = json_decode($res);
                $array=json_encode($array);
                echo $array;
                die();
            }
        break;
        default:
        break;
    }
                    
?>
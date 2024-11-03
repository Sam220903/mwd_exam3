<?php
	$config	='lottery/configLottery.php';
	include_once '../../base/header.php';
	
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
            if(isset($_GET['action'])){
                switch($_GET['action']){
                    case 'getLottery':
                        $conn = connection($connection);
                        $res = getLottery($conn);
                        $array = array();
                        $array['status'] = 200;
                        $array['error'] = false;
                        $array['data'] = json_decode($res);
                        $array=json_encode($array);
                        echo $array;
                        die();
                    break;
                    case 'singLottery':
                        $conn = connection($connection);
                        $res = singLottery($conn);
                        $array = array();
                        $array['status'] = 200;
                        $array['error'] = false;
                        $array['data'] = json_decode($res);
                        $array=json_encode($array);
                        echo $array;
                        die();
                    break;

                    case  'searchCard':
                        $cardName = isset($_GET['cardName']) ? $_GET['cardName'] : '';
                        $conn = connection($connection);
                        $res = searchCard($conn, $cardName);
                        $array = array();
                        $array['status'] = 200;
                        $array['error'] = false;
                        $array['data'] = json_decode($res);
                        $array=json_encode($array);
                        echo $array;
                        die();
                    break;

                    default:
                    break;
            }
        }      
			die();
        break;
        
        default:
        break;
    }	
?>
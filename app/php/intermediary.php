<?php

/* ----------- Header 		------------------------*/
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,POST,PATCH,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
/* ----------- Header 		------------------------*/

define("UTF8",JSON_UNESCAPED_UNICODE);

function curlPHP($url,$metodo,$datos,$auth){
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $metodo,
        CURLOPT_POSTFIELDS => $datos,
        CURLOPT_HTTPHEADER => array(
            'Authorization: '.$auth,
            'Content-Type: application/json'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

$data = json_decode(file_get_contents("php://input"));
if(isset($data->endpoint)){
    if($data->method == "GET"){
        if($data->endpoint == "getLottery"){
            $url = "http://localhost/Examen3DWM/api/services/lottery/?numCards=16";
            $method = "GET";
            $data = "";
            $auth = "12345";
            $response = curlPHP($url,$method,$data,$auth);
            $response = json_decode($response);
            $html = "";
    
            if(isset($response->status) && $response->status == 200){
                $counter = 0;
                foreach($response->data as $card){
                    if($counter % 4 == 0) $html .= "<tr>";
                    $html .= "<td>";
                    $html .= "<img src='..\..\api\img\lottery\\".$card->image."' width='120' height='160' alt='$card->name'>";
                    $html .= "</td>";
                    if($counter % 4 == 3) $html .= "</tr>";
                    $counter++;             
                }
                $array = array("status"=>200,"data"=>$html);
                echo json_encode($array,UTF8);
                die();
            }
        } else if ($data->endpoint == "getCards"){
            $url = "http://localhost/Examen3DWM/api/services/lottery/";
            $method = "GET";
            $data = "";
            $auth = "12345";
            $response = curlPHP($url,$method,$data,$auth);
            $response = json_decode($response);
            $html = "";
    
            if(isset($response->status) && $response->status == 200){
                $cards = array();
                foreach($response->data as $card){
                    $html = "<img src='..\..\api\img\lottery\\".$card->image."' id='chosen-card' width='180' height='240' alt='$card->name'>";
                    array_push($cards,$html);
                }
                $array = array("status"=>200,"data"=>$cards);
                echo json_encode($array,UTF8);
                die();
            }
        } else if ($data->endpoint == "getCardbyID"){
            if(isset($data->cardID)){
                $url = "http://localhost/Examen3DWM/api/services/lottery/?cardID=".$data->cardID;
                $method = "GET";
                $data = "";
                $auth = "12345";
                $response = curlPHP($url,$method,$data,$auth);
                $response = json_decode($response);
                $html = "";
        
                if(isset($response->status) && $response->status == 200){
                    $card = $response->data[0];
                    $html = "<img src='..\..\api\img\lottery\\".$card->image."' id='chosen-card' width='180' height='240' alt='$card->name'>";
                    $array = array("status"=>200,"data"=>$html);
                    echo json_encode($array,UTF8);
                    die();
                }
            }
        } else {
            $array = array("status"=>404,"message"=>"Not Found");
            echo json_encode($array,UTF8);
            die();
        }
        
    } else if ($data->method = "POST"){
        if($data->endpoint == "addCard"){
            if(isset($data->name) && isset($data->image)){
                $url = "http://localhost/Examen3DWM/api/services/lottery/";
                $method = "POST";
                $image = saveImage($data->image);
                $data = json_encode(array("name"=>$data->name,"image"=>$image));
                $auth = "12345";
                $response = curlPHP($url,$method,$data,$auth);
                $response = json_decode($response);
        
                if(isset($response->status) && $response->status == 200){
                    $array = array("status"=>200,"message"=>"Carta agregada correctamente");
                    echo json_encode($array,UTF8);
                    die();
                } else {
                    $array = array("status"=>404,"message"=>"Error al agregar la carta");
                    echo json_encode($array,UTF8);
                    die();
                }
            }
        } else {
            $array = array("status"=>404,"message"=>"Error al agregar la carta");
            echo json_encode($array,UTF8);
            die();
        }
    } else {
        $array = array("status"=>404,"message"=>"Acción desconocida");
        echo json_encode($array,UTF8);
        die();

    }
    
} else {
    $array = array("status"=>404,"message"=>"Endpoint no encontrado");
    echo json_encode($array,UTF8);
    die();
}

function saveImage($image){
    $image_parts = explode(";base64,", $image);
    $image_base64 = base64_decode($image_parts[1]);
    $file_name = uniqid().".jpg";
    $file = "../../api/img/lottery/".$file_name;
    file_put_contents($file, $image_base64);
    return $file_name;
}
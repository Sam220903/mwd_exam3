<?php

function getLottery($conn, $numCards, $cardID){
    if (isset($numCards)) $sql = 'SELECT * FROM cards WHERE status = 1 ORDER BY RAND() LIMIT '.$numCards;
    else if (isset($cardID)) $sql = 'SELECT * FROM cards WHERE id = '.$cardID;
    else $sql = "SELECT * FROM cards WHERE status = 1 ORDER BY RAND()";

    $result = $conn->query($sql);
    $row = $result->fetch_all(MYSQLI_ASSOC);
    $row = json_encode($row);
    return $row;
}

function insertCard($conn, $data){
    $stmt = $conn->prepare("INSERT INTO cards (name, image) VALUES (?,?)");
    $stmt->bind_param("ss", $data->name, $data->image);
    if($stmt->execute()){
        $res=array(
            "id"=>$conn->insert_id,
			"name"=>$data->name,
            "image"=>$data->image
        );
        return json_encode($res,UTF8);
    } else {
        echo "Error: ".$stmt->error;
    }
}


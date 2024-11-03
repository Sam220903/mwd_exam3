<?php

function getLottery($conn){
    $sql = "SELECT * FROM cards WHERE status = 1 ORDER BY RAND() LIMIT 16";
    $result = $conn->query($sql);
    $row = $result->fetch_all(MYSQLI_ASSOC);
    $row = json_encode($row);
    return $row;
}

function singLottery($conn){
    $sql = "SELECT * FROM cards WHERE status = 1 ORDER BY RAND()";
    $result = $conn->query($sql);
    $row = $result->fetch_all(MYSQLI_ASSOC);
    $row = json_encode($row);
    return $row;
}

function searchCard($conn, $cardName){
    $sql = 'SELECT * FROM cards WHERE name LIKE "%'.$cardName.'%"';
    $result = $conn->query($sql);
    $row = $result->fetch_all(MYSQLI_ASSOC);
    $row = json_encode($row); 
    return $row;
}
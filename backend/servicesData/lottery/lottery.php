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


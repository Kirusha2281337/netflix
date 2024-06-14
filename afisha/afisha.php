<?
session_start();
    include "../shortcuts/dbcon.php";

    $data = json_decode(file_get_contents('php://input'), true);
    
    $sql = "INSERT INTO cart (user_id, movie_id) 
    VALUES ('$_SESSION[id]', '$data')";
    $result = $conn->query($sql);
    
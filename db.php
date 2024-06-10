<?php

include 'shortcuts/dbcon.php';

$data = json_decode(file_get_contents('php://input'), true);
if(isset($data)){
switch ($data["chck_desc"]){
    case "1":
        switch ($data["sel"]){
            case "name":
                $sql = "SELECT * from afisha ORDER BY name DESC";
                break;
            case "date":
                $sql = "SELECT * FROM afisha ORDER BY date_show DESC";
                break;
            case "price":
                $sql = "SELECT * FROM afisha ORDER BY price DESC";
                break;
        }
        break;
    case null:
        switch ($data["sel"]){
            case "name":
                $sql = "SELECT * from afisha ORDER BY name";
                break;
            case "date":
                $sql = "SELECT * FROM afisha ORDER BY date_show";
                break;
            case "price":
                $sql = "SELECT * FROM afisha ORDER BY price";
                break;
        }
        break;
}
}
else{$sql = "SELECT * from afisha";}
$result_afisha = $conn -> query($sql) or die(mysqli_error($conn));
$rows_afisha = $result_afisha -> fetch_all(MYSQLI_ASSOC);

$sql_about = "SELECT * FROM afisha order by id desc limit 5";
$result_about = $conn -> query($sql_about) or die(mysqli_error($conn));
$rows_about = $result_about -> fetch_all(MYSQLI_ASSOC);

$return = array(
    "rows_afisha" => $rows_afisha,
    "rows_about" => $rows_about
);
echo json_encode($return);
<?
session_start();
    include '../shortcuts/dbcon.php';
    $sql = "SELECT movie_id FROM cart where user_id = $_SESSION[id]";
    $result = $conn -> query($sql) or die($conn -> error);
    $rows = $result -> fetch_all();
    $rows_cart = array();
    forEach($rows as $i){
            forEach($i as $movie){
                $rows_cart[current($i)] = $movie;
            }
        }
    print_r(array_keys($rows_cart));
    
    $sql2 = "SELECT * FROM afisha where id = $rows_cart[i]";
    $result2 = $conn -> query($sql2) or die($conn -> error);
    // $rows2 = $result2 -> fetch_all(MYSQLI_ASSOC);
    
    
    // echo json_encode($rows2, JSON_HEX_TAG);
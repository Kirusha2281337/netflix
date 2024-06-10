<?
    session_start();
    
    if(isset($_SESSION['id'])){
        include 'shortcuts/dbcon.php';
        $sql = "SELECT * FROM users where id = $_SESSION[id]";
        $result_session = $conn -> query($sql) or die(mysqli_error($conn));
        $row_session = mysqli_fetch_array($result_session, MYSQLI_ASSOC);
        $return = array(
        "users_name" => $row_session['name'],
        "users_surname" => $row_session['surname'],
        "users_patronymic" => $row_session['patronymic'],
        "users_login" => $row_session['login'],
        "users_email" => $row_session['email'],
        "users_pass" => $row_session['pass'],
        "users_role" => $row_session['role']
        );
        echo json_encode($return, JSON_HEX_TAG);
    }
    $data = json_decode(file_get_contents('php://input'), true);
    if($data == "destroy"){
        session_destroy();
    }
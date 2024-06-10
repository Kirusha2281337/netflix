<?
    if(isset($_POST)){
        include '../shortcuts/dbcon.php';

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $patronymic = $_POST['patronymic'];
        $login = $_POST['login'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $sql = "INSERT INTO users (name, surname, patronymic, login, email, pass)
            VALUES('$name', '$surname', '$patronymic', '$login', '$email', '$pass')";
        if ($conn->query($sql) == TRUE) {
            echo "Новая запись создана";
        }
        else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    else{
        echo "Данные не передаются";
    }
    $conn->close();
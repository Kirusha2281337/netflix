<?
    session_start();
    if(isset($_POST)){
        include '../shortcuts/dbcon.php';

        $login = $_POST['login'];
        $pass = $_POST['passl'];
        $sql = "SELECT * FROM users WHERE login = '$login' AND pass = '$pass'";
        
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if (mysqli_num_rows($result) > 0) 
        {
            echo "Вы вошли";
            $_SESSION['id'] = $row['id'];
            sleep(1);
            header('Location: ../about/about.html');
        }
        else
        {
            echo "Анлаки вы не вошли" . mysqli_error($conn);
            unset($_SESSION['id']);
            sleep(1);
            header('Location: ../about/about.html');
        }
    }
    else{
        echo "Данные не передаются";
    }
    $conn->close();
     // $result2 = $conn->query("SELECT * FROM users");

        // if ($row['role'] == ) 
        // {
        //     echo "<table border='1'><tr>";
        //     for($i=0;$i<mysqli_num_fields($result2);$i++)
        //     {
        //         $field = mysqli_fetch_field($result2);
        //         echo "<td>{$field->name}</td>";
        //     }
        //     echo "</tr>\n";

        //     while($row = mysqli_fetch_row($result2))
        //         {
        //             echo "<tr>";
        //             foreach($row as $cell)
        //                 echo "<td>$cell</td>";

        //             echo "</tr>\n";
        //         }
        //     echo "</table>";
        // }
    
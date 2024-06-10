<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="input.css">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script> 
        $(function(){
            $("#header").load("../shortcuts/headers.html"); 
        });
    </script>
</head>
<body>
    <header id="header"></header>
    <button id="sort_btn">Сортировка</button>
    <form method="POST" enctype="multipart/form-data">
        <h3>Пополнение бд афишы</h3>
        <input type="text" name="name" placeholder="Название">
        <input type="date" name="date_show" placeholder="Дата показа">
        <input type="text" name="description" placeholder="Описание">
        <input type="text" name="age" placeholder="Возрастной рейтинг">
        <select name="genre">
            
            <option default disabled>Жанры</option>
            <?php
                include "../shortcuts/dbcon.php";
                $result = mysqli_query($conn, "SELECT * FROM genre") or die(mysqli_error($conn));
                $row = mysqli_num_rows($result);
                foreach ($result as $row) {
                     echo '<option>'.$row['genre'].'</option>';
                }
            ?>
        </select>
        <input type="text" name="price" placeholder="Цена">
        <input type="file" name="image" placeholder="Постер" accept="image/*">
        <input type="submit" value="Отправить">
    </form>
</body>
</html>
<?php
session_start();
    echo $_SESSION['login'];
    echo $_SESSION['passl'];
    if(isset($_POST["name"])){
    //переменные
    $name = $_POST["name"];
    $dateshow = $_POST["date_show"];
    $description = $_POST["description"];
    $age = $_POST["age"];
    $genre = $_POST["genre"];
    $price = $_POST["price"];
    $img = $_FILES["image"];
    //картинка
    $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    if(!is_dir(`$rootDir/uploads/`)){
        mkdir(`$rootDir/uploads/`,0777,true);
    }
    $extension=pathinfo($img['name'], PATHINFO_EXTENSION);
    $fileName = time().".$extension";
    if(!move_uploaded_file($img['tmp_name'], "$rootDir/uploads/".$fileName)){echo "Ошибка загрузки";}
    $img = "uploads/$fileName";
    //подключение и отправка
    $conn = new mysqli("localhost", "root", "", "netflix");
    $sql = "INSERT INTO afisha (name, date_show, description, age, genre, price, photo) 
        VALUES ('$name', '$dateshow', '$description', '$age', '$genre', '$price', '$img')";
    if ($conn -> query($sql)) {echo "<p>Данные успешно добавлены в бд</p>";} 
        else{die(mysqli_error($conn));};
    }
?>
<?
    $conn = new mysqli('localhost','root','','netflix');
    if ($conn->connect_error) 
    {
        die("Подключение к бд не удалось: " . mysqli_connect_error());
    }
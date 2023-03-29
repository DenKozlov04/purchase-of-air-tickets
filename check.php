<?php
   $login = filter_var(trim($_POST['username']),FILTER_SANITIZE_STRING);
// Удаляем пробелы и HTML символы  
$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
$phone = filter_var(trim($_POST['phone']),FILTER_SANITIZE_STRING);
$con_password = filter_var(trim($_POST['con-password']),FILTER_SANITIZE_STRING);

if(mb_strlen($login) <5 || mb_strlen($login) > 90){//если длинна переменной логина меньше чем 5 или длинна логина больше 90 то выводим "ошибку"
    echo  "Incorect username length";
    exit();
}

else if(mb_strlen($email) <2 || mb_strlen($email) > 90){
    echo  "Incorect email length";
    exit();
}

else if(mb_strlen($phone) <12 || mb_strlen($phone) > 12){
    echo  "Incorect phone length";
    exit();
}

else if(mb_strlen($con_password) <8 || mb_strlen($con_password) > 32){
    echo  "Incorect password length (from 8 to 32 symbols)";
    exit();
}

$mysql = new mysqli('localhost','root','','air_flights_database');

$mysql->query("INSERT INTO`users`(`username,email` ,`password` ,`phone` ,`created_at`) 
VALUES('$login','$email','$phone','$con_password')");

$mysql->close();
?>
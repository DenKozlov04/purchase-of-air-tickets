<?php


$login = htmlspecialchars(filter_var(trim($_POST['username']),FILTER_SANITIZE_STRING));
$email = htmlspecialchars(filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING));
$phone = htmlspecialchars(filter_var(trim($_POST['phone']),FILTER_SANITIZE_STRING));
$con_password = htmlspecialchars(filter_var(trim($_POST['con-password']),FILTER_SANITIZE_STRING));

if(mb_strlen($login) <5 || mb_strlen($login) > 90){
    echo "<script>alert(\"Incorrect username length\");</script>";
    exit();
} else if(mb_strlen($email) <2 || mb_strlen($email) > 90){
    echo "<script>alert(\"Incorrect email length\");</script>";
    exit();
} else if(mb_strlen($phone) <12 || mb_strlen($phone) > 12){
    echo "<script>alert(\"Incorrect phone length\");</script>";
    exit();
} else if(mb_strlen($con_password) <8 || mb_strlen($con_password) > 32){
    echo "<script>alert(\"Incorrect password length (from 8 to 32 symbols)\");</script>";
    exit();
} else {
    // Хэшируем пароль и добавляем к нему дополнительный ключ
    $con_password = md5($con_password."356ads34749ad9s");

    // Подключаемся к базе данных
    $mysql = new mysqli('localhost','root','','airflightsdatabase');

    // pārbaudījam, vai lietotājs ar tādu pašu nosaukumu jau eksistē
    $result = $mysql->query("SELECT user_id FROM users WHERE username='$login'");
    if($result->num_rows>0){
        echo "<script>alert(\"This username already exists\");</script>";
        exit();
    }

    // pārbaudījam, vai lietotājs ar tādu pašu e-pastu jau eksistē
    $result = $mysql->query("SELECT user_id FROM users WHERE email='$email'");
    if($result->num_rows>0){
        echo "<script>alert(\"This email already exists\");</script>";
        exit();
    }

    // pārbaudījam, vai lietotājs ar tādu pašu telefons numuru jau eksistē
    $result = $mysql->query("SELECT user_id FROM users WHERE phone='$phone'");
    if($result->num_rows>0){
        echo "<script>alert(\"This phone already exists\");</script>";
        exit();
    }

    // pievienojam lietotājus datubazē
    $mysql->query("INSERT INTO `users` (`username`, `email`, `phone`, `password`, `created_at`) 
        VALUES('$login', '$email', '$phone', '$con_password', now() )");

    // Закрываем соединение с базой данных
    $mysql->close();

    // Перенаправляем пользователя на страницу авторизации
    header('Location:../index.html');
}


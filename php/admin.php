<?php


$Airline = htmlspecialchars(filter_var(trim($_POST['Airline']),FILTER_SANITIZE_STRING));
$airport_name = htmlspecialchars(filter_var(trim($_POST['airport_name']),FILTER_SANITIZE_STRING));
$ITADA = htmlspecialchars(filter_var(trim($_POST['ITADA']),FILTER_SANITIZE_STRING));
$City = htmlspecialchars(filter_var(trim($_POST['City']),FILTER_SANITIZE_STRING));
$county = htmlspecialchars(filter_var(trim($_POST['county']),FILTER_SANITIZE_STRING));
$T_price = htmlspecialchars(filter_var(trim($_POST['T_price']),FILTER_SANITIZE_STRING));
$departure_date = htmlspecialchars(filter_var(trim($_POST['departure_date']),FILTER_SANITIZE_STRING));
$arrival_date = htmlspecialchars(filter_var(trim($_POST['arrival_date']),FILTER_SANITIZE_STRING));

if(mb_strlen($Airline) <3 || mb_strlen($Airline) > 255){
    echo "<script>alert(\"Incorrect airline length\");</script>";
    exit();
} else if(mb_strlen($airport_name) <3 || mb_strlen($airport_name) > 255){
    echo "<script>alert(\"Incorrect airport name length\");</script>";
    exit();
} else if(mb_strlen($ITADA) <3 || mb_strlen($ITADA) > 3){
    echo "<script>alert(\"Incorrect ITADA length\");</script>";
    exit();
} else if(mb_strlen($T_price) <2 || mb_strlen($T_price) > 8){
    echo "<script>alert(\"Incorrect airport name length\");</script>";
    exit();
} else if(mb_strlen($departure_date) <10 || mb_strlen($departure_date) > 10){
    echo "<script>alert(\"Incorrect airport name length\");</script>";
    exit();
} else if(mb_strlen($arrival_date) <10 || mb_strlen($arrival_date) > 10){
    echo "<script>alert(\"Incorrect airport name length\");</script>";
    exit();
} else if(mb_strlen($City) <2 || mb_strlen($City) > 255){
    echo "<script>alert(\"Incorrect city length (from 2 to 255 symbols)\");</script>";
    exit();
} else {

    // Подключаемся к базе данных
    $mysql = new mysqli('localhost','root','','airflightsdatabase');

    // Добавляем пользователя в базу данных
    $mysql->query("INSERT INTO `airports/airlines` (`Airline`, `airport_name`, `ITADA`, `City`, `county`,`T_price`,`departure_date`,`arrival_date`,`created_at`) 
        VALUES('$Airline', '$airport_name', '$ITADA', '$City','$county','$T_price','$departure_date','$arrival_date', now() )");

    // Закрываем соединение с базой данных
    $mysql->close();

    // Перенаправляем пользователя на страницу авторизации
    header('Location:../index.html');
    // ДАБВАВИТЬ КОНКРЕТНОЕ ВРЕМЯ ОТЛЕТА!!!!!!!!!!!!!!!!!!!!!
}

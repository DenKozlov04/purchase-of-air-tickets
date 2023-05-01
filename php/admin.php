
<?php
$Airline = htmlspecialchars(filter_var(trim($_POST['Airline']),FILTER_SANITIZE_STRING));
$airport_name = htmlspecialchars(filter_var(trim($_POST['airport_name']),FILTER_SANITIZE_STRING));
$ITADA = htmlspecialchars(filter_var(trim($_POST['ITADA']),FILTER_SANITIZE_STRING));
$City = htmlspecialchars(filter_var(trim($_POST['City']),FILTER_SANITIZE_STRING));
$country = htmlspecialchars(filter_var(trim($_POST['country']),FILTER_SANITIZE_STRING));
$T_price = htmlspecialchars(filter_var(trim($_POST['T_price']),FILTER_SANITIZE_STRING));
$departure_date = htmlspecialchars(filter_var(trim($_POST['departure_date']),FILTER_SANITIZE_STRING));
$arrival_date = htmlspecialchars(filter_var(trim($_POST['arrival_date']),FILTER_SANITIZE_STRING));
$arrival_time = htmlspecialchars(filter_var(trim($_POST['arrival_time']),FILTER_SANITIZE_STRING));
$departure_time = htmlspecialchars(filter_var(trim($_POST['departure_time']),FILTER_SANITIZE_STRING));

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
} else if(mb_strlen($arrival_time) <5 || mb_strlen($arrival_time) > 8){
    echo "<script>alert(\"Incorrect city length (from 5 to 8 symbols)\");</script>";
    exit();
} else if(mb_strlen($departure_time) <5 || mb_strlen($departure_time) > 8){
    echo "<script>alert(\"Incorrect city length (from 5 to 8 symbols)\");</script>";
    exit();
} else {
    
    // pieslezējamies pie datu bāzes
    $mysql = new mysqli('localhost','root','','airflightsdatabase');

    //Pievienojam lidojumu nosaukumu, ITADA kodu,pilsētu, valsti,biļetes cēnu, ierašanās un izbraukšanas datumu un laiku datubāzei.
    $mysql->query("INSERT INTO `airports/airlines` (`Airline`, `airport_name`, `ITADA`, 
    `City`, `country`,`T_price`,`departure_date`,`arrival_date`,
    `arrival_time`,`departure_time`,`created_at`) 
        VALUES('$Airline', '$airport_name', '$ITADA', '$City',
        '$country','$T_price','$departure_date','$arrival_date',
        '$arrival_time','$departure_time', now() )");

    // aizveram pieslēgšanu ar datu bāzi
    $mysql->close();


    header('Location:../Html\Buy_Tickets.php');

}

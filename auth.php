<?php

$login = filter_var(trim($_POST['username']),FILTER_SANITIZE_STRING);
$con_password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

    $con_password = md5($con_password."356ads34749ad9s");
    // хеширование пароля и дополнительное усложнение

    $mysql = new mysqli('localhost','root','','airflightsdatabase');

    $result = $mysql->query("SELECT * FROM `users`  WHERE `username` = '$login' AND `password` = '$con_password'");
    // $mysql->query("INSERT INTO `users` (`username`, `email`, `phone` ,`password`, `created_at`) 
    // VALUES('$login', '$email', '$phone', '$con_password', now() )");
    $user = $result-> fetch_assoc();//создаем массив

    if(count($user) == 0){
        // echo "<script>alert(\"User not found,try again\");</script>";
        echo "User not found,try again";
        exit();
    }

    print_r($user);
    exit();

    $mysql->close();

    header('Location: /');

?>
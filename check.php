<?php
$login = filter_var(trim($_POST['username']),FILTER_SANITIZE_STRING);
// Удаляем пробелы и HTML символы  
$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
$phone = filter_var(trim($_POST['phone']),FILTER_SANITIZE_STRING);
$con_password = filter_var(trim($_POST['con-password']),FILTER_SANITIZE_STRING);

if(mb_strlen($login) <5 || mb_strlen($login) > 90){//если длинна переменной логина меньше чем 5 или длинна логина больше 90 то выводим "ошибку"
    // header('Location: registration.html');
    // echo '<script>alert("Incorect username length")</script>';
    echo "Incorect username length";
    exit();
}

else if(mb_strlen($email) <2 || mb_strlen($email) > 90){
    // header('Location: registration.html');
    echo "Incorect email length";
    exit();
}

else if(mb_strlen($phone) <12 || mb_strlen($phone) > 12){
    // header('Location: registration.html');
    echo "Incorect phone length";
    exit();
}

else if(mb_strlen($con_password) <8 || mb_strlen($con_password) > 32){
    // header('Location: registration.html');
    echo "Incorect password length (from 8 to 32 symbols)";
    exit();
}//else {
    $con_password = password_hash($con_password, PASSWORD_DEFAULT);
    // хеширование пароля и дополнительное усложнение

    $mysql = new mysqli('localhost','root','','airflightsbd');

    $mysql->query("INSERT INTO `users` (`username`, `email`, `phone` ,`password`, `created_at`) 
    VALUES('$login', '$email', '$phone', '$con_password', now() )");

    $mysql->close();

    // header('Location: index.html');
// }


?>
<!-- !!!!НУЖНО ОБЕЗОПАСИТЬ!!!! -->

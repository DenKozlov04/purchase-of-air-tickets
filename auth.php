<?php

// $login = htmlspecialchars(filter_var(trim($_POST['username'])),FILTER_SANITIZE_STRING);
// $con_password = htmlspecialchars(filter_var(trim($_POST['password'])),FILTER_SANITIZE_STRING);

//     $con_password = htmlspecialchars(md5($con_password."356ads34749ad9s"));
//     // хеширование пароля и дополнительное усложнение

//     $mysql = new mysqli('localhost','root','','airflightsdatabase');

//     $result = $mysql->query("SELECT * FROM `users`  WHERE `username` = '$login' AND `password` = '$con_password'");
//     $user = $result-> fetch_assoc();//создаем массив

//     if(is_array($user) && count($user) == 0){
//          // echo "<script>alert(\"User not found,try again\");</script>";
//         echo "User not found, try again";
//         exit();
//     }

//     print_r($user);
    

//     $mysql->close();

//     header('Location:index.html');

//     exit();

// session_start();
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//   $username = $_POST['username'];
//   $password = $_POST['password'];
//   // проверка наличия пользователя в базе данных
//   // если пользователь существует, добавляем его в сессию и перенаправляем на страницу приветствия
//   // если пользователь не найден, выводим сообщение об ошибке

// // подключаемся к базе данных
//     $db = new PDO('mysql:host=localhost;dbname=airflightsdatabase', 'root', '');

//     $username = $_POST['username'];
//     $password = $_POST['password'];

// // проверяем наличие пользователя в базе данных
//     $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
//     $stmt->execute([$username]);
//     $user = $stmt->fetch();

//     if ($user && password_verify($password, $user['password'])) {
//   // добавляем пользователя в сессию
//     $_SESSION['user'] = $user;
//   // перенаправляем на страницу приветствия
//     header('Location: index.html');
//     exit;
//     } else {
//   // выводим сообщение об ошибке
//     echo "Неправильный email или пароль";
//     }
// }

// Подключение к базе данных MySQL
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // подключаемся к базе данных
    $conn = mysqli_connect('localhost','root','','airflightsdatabase');
    // проверяем соединение
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // создаем SQL запрос на проверку данных пользователя в базе данных
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    // проверяем, есть ли такой пользователь в базе данных
    if (mysqli_num_rows($result) > 0) {
        // если есть, то сохраняем ID пользователя в сессии
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id'];

        // перенаправляем на главную страницу
        header('Location: index.php');
    } else {
        // если такого пользователя нет, то выводим ошибку
        echo "Invalid username or password";
    }

    // закрываем соединение с базой данных
    mysqli_close($conn);
}

?>

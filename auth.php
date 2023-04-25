<?php

session_start();

// Проверяем, была ли отправлена форма входа на сайт
if (isset($_POST['login'])) {
    // Получаем данные из формы входа
    $username = $_POST['username'];
    $password = $_POST['password'];
    $con_password = md5($password."356ads34749ad9s");
    
    // Проверяем, является ли пользователь администратором
    if ($username === 'admin' && $password === 'Admin292020') {
        // Если пользователь является администратором, то перенаправляем его на страницу регистрации
        header("Location: registration.html");
        exit();
    }
    
    // Подключаемся к базе данных
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "airflightsdatabase";
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

    // Проверяем, удалось ли подключиться к базе данных
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Получаем данные пользователя из базы данных
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$con_password'";
    $result = mysqli_query($conn, $sql);

    // Проверяем, удалось ли получить данные пользователя из базы данных
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hash = $row['password'];
        // Проверяем, совпадает ли хешированный пароль из базы данных с введенным паролем
        if ($con_password == $hash) {
            // Если пароль совпадает, то сохраняем данные пользователя в сессии
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $row['id'];
            // Перенаправляем пользователя на защищенную страницу
            header("Location: index.html");
            exit();
        } else {
            // Если пароль не совпадает, то выводим ошибку
            echo "Invalid username or password";
        }
    } else {
        // Если пользователь не найден, то выводим ошибку
        echo "Invalid username or password";
    }

    // Закрываем соединение с базой данных
    mysqli_close($conn);
}

?>

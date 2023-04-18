<?php


// $login = htmlspecialchars(filter_var(trim($_POST['username']),FILTER_SANITIZE_STRING));
// $password = htmlspecialchars(filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING));


// $password = password_hash($password, PASSWORD_DEFAULT);
// // хеширование пароля и дополнительное усложнение

// $mysql = new mysqli('localhost','root','','airflightsdatabase');

// $result =$mysql->query("SELECT * FROM `users` WHERE `username` = '$login' AND `password` = '$password'");
// $user = $result-> fetch_assoc();

// if(count($user) == 0)
// {
//              // echo "<script>alert(\"User not found,try again\");</script>";
//             echo "User not found, try again";
//             exit();
//         }
//         print_r($user);
//         exit();

// $mysql->close();

// header('Location: index.html');



// session_start();

// if (isset($_POST['username']) && isset($_POST['password'])) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     // хешируем пароль
//     // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

//     // подключаемся к базе данных
//     $conn = mysqli_connect('localhost','root','','airflightsdatabase');
//     // проверяем соединение
//     if (!$conn) {
//         die("Connection failed: " . mysqli_connect_error());
//     }

//     // создаем SQL запрос на проверку данных пользователя в базе данных
//     $sql = "SELECT * FROM users WHERE username='$username' ";
//     $result = mysqli_query($conn, $sql);

//     // проверяем, есть ли такой пользователь в базе данных
//     if (mysqli_num_rows($result) > 0) {
//         $row = mysqli_fetch_assoc($result);
//         // проверяем, совпадает ли хеш пароля из базы данных с введенным паролем
//         if (password_verify($password, $row['password'])) {
//             // если пароль совпадает, то сохраняем ID пользователя в сессии
//             $_SESSION['user_id'] = $row['id'];

//             // перенаправляем на главную страницу
//             header('Location: index.php');
//         } else {
//             // если пароль не совпадает, то выводим ошибку
//             echo "Invalid username or password";
//         }
//     } else {
//         // если такого пользователя нет, то выводим ошибку
//         echo "XD";
//     }

//     // закрываем соединение с базой данных
//     mysqli_close($conn);
// }


session_start();

// Проверяем, была ли отправлена форма входа на сайт
if (isset($_POST['login'])) {
    // Получаем данные из формы входа
    $username = $_POST['username'];
    $password = $_POST['password'];

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
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    // Проверяем, удалось ли получить данные пользователя из базы данных
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hash = $row['password'];
        // Проверяем, совпадает ли хешированный пароль из базы данных с введенным паролем
        if (password_verify($password, $hash)) {
            // Если пароль совпадает, то сохраняем данные пользователя в сессии
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $row['id'];
            // Перенаправляем пользователя на защищенную страницу
            header("Location: secure.php");
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

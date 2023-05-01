<?php

session_start();


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $con_password = md5($password."356ads34749ad9s");

    if ($username === 'admin' && $password === 'Admin292020') {
        header("Location: adminPage.php");
        $_SESSION['admin_id'] = 1;
        exit();
        
    }
    
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "airflightsdatabase";
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$con_password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hash = $row['password'];
        
        if ($username != 'admin' or $password != 'Admin292020') {

            $_SESSION['admin_id'] = 2;
            header("Location: index.php");
            exit();
            
        }
        if ($con_password == $hash) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $row['user_id'];

            header("Location: index.php");
            exit();
        } else {

            echo "Invalid username or password";
        }
    } else {
 
        echo "Invalid username or password";
    }

    mysqli_close($conn);
}

?>

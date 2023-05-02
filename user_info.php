<?php
    session_start();
    echo "<h1>Welcome, {$_SESSION['username']}</h1>";
    echo "<h1>Your user ID is {$_SESSION['user_id']}</h1>";
    echo "<p>Your email is {$_SESSION['email']}</p>";


    ?> 
<!DOCTYPE html>
<html>
<head>
<title>Air travel throughout the Baltics</title>
<meta charset='utf-8' />
</head>
<body>
<h2>Анкета</h2>
<form action='input.php' method='POST'>
<div class ='search'>
    <p>Enther your country<br> 
    <div class = 'box1-input'>
        <input type='text' name='country' placeholder='your country'/> </p>
        <label for='box1'>From Where</label>
        <form action1='input.php' method='POST1'>
    </div>
    <div class = 'box2'>
        <p>Введите фамилию:<br>
        <input type='text' name='lastname'placeholder='Where' /></p>
        <form action2='input.php' method='POST2'>
    </div>
    <div class = 'box3'>
        <p>Введите почту:<br>
        <input type='text' name='parol'placeholder='Select departure date' /></p>
        <form action3='input.php' method='POST3'>
    </div>
    <div class = 'box4'>
        <p>Введите пароль:<br>
        <input type='text' name='post' placeholder='Select return date' /></p>
    </div>
    <div class = 'box5'>
        <br>Введите почту:<br>
        <input type='text' name='parol'placeholder='number of passengers and class' /></p>
        <form action4='input.php' method='POST4'>
    </div>
    <div class = 'box6'>
        <button type='button'>Find tickets</button>
        <form action5='input.php' method='POST5'>
    </div>
</div>
<p>Краткий комментарий: <br>
<textarea name='comment' maxlength='200'></textarea></p>
<input type='submit' value='Отправить'>
</form>
</body>
</html>

<?php
//⇒

// require 'helpers.php';

// $items = ['a' => 1,'b' => 2,'c' => 3,'d' => 4,'e' => 5];

// prettyPrintArray(array_chunk($items,2,true));

// $array1 =['a','b','c'];
// $array2 =[5,10,15];

// prettyPrintArray(array_combine($array1,$array2));

// $array = [1,2,3,4,5,6,7,8,9,10];

// $event = array_filter($array, fn($number) => $number % 2 == 0);

// prettyPrintArray($event);
//  ?>

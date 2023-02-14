<?php
$txt = 'PHP';
echo "I love $txt!

<!DOCTYPE html>
<html>
<head>
<title>Air travel throughout the Baltics</title>
<meta charset='utf-8' />
</head>
<body>
<h2>Анкета</h2>
<form action='input.php' method='POST'>
<p>Введите имя:<br> 
<input type='text' name='firstname' /></p>
<form action1='input.php' method='POST1'>
<p>Введите фамилию:<br>
<input type='text' name='lastname' /></p>
<form action2='input.php' method='POST2'>
<p>Введите почту:<br>
<input type='text' name='parol' /></p>
<form action3='input.php' method='POST3'>
<p>Введите пароль:<br>
<input type='text' name='post' /></p>
<p>Форма обучения: <br> 
<input type='radio' name='eduform' value='очно' />очно <br>
<input type='radio' name='eduform' value='заочно' />заочно </p>
<p>Требуется общежитие:<br>
<input type='checkbox' name='hostel' />Да</p>
<input type='checkbox' name='hostel' />net</p>
<p>Краткий комментарий: <br>
<textarea name='comment' maxlength='200'></textarea></p>
<input type='submit' value='Отправить'>
</form>
</body>
</html>";

//⇒

require'helpers.php';

$items = ['a' => 1,'b' => 2,'c' => 3,'d' => 4,'e' => 5];

prettyPrintArray(array_chunk($items,2,true));

$array1 =['a','b','c'];
$array2 =[5,10,15];

prettyPrintArray(array_combine($array1,$array2));

$array = [1,2,3,4,5,6,7,8,9,10];

$event = array_filter($array, fn($number) => $number % 2 == 0);

prettyPrintArray($event);
?>

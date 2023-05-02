
<?php
session_start();

echo "<h1>Welcome, {$_SESSION['username']} , do you want to order ticket?</h1>";
echo "<h1>Your user ID is {$_SESSION['user_id']}</h1>";
echo "<p>Your email is {$_SESSION['email']} .Don't forget it</p>";


$mysqli = new mysqli("localhost", "root", "", "airflightsdatabase");

if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

$airline_id = $_POST['airline_id'];

$result = $mysqli -> query("SELECT `ticket_id` FROM `tickets` WHERE `airlines_id` = '$airline_id'");

if ($result -> num_rows > 0) {
  while ($row = $result -> fetch_assoc()) {
    echo  $row["ticket_id"] ;
}
  } else {
   echo "ERROR";
}



$airline_id = $_POST['airline_id'];
$Airline = $_POST['Airline'];
$airport_name = $_POST['airport_name'];
$ITADA = $_POST['ITADA'];
$City = $_POST['City'];
$T_price = $_POST['T_price'];
$arrival_date = $_POST['arrival_date'];
$departure_date = $_POST['departure_date'];
$arrival_time = $_POST['arrival_time'];
$departure_time = $_POST['departure_time'];

  $random_number = rand(10, 99);
  $random_letter = chr(rand(65, 90)); // генерируем случайную заглавную букву в ASCII диапазоне от 65 до 90

  $random_data = $random_number . $random_letter;// выводит, например, "F37"

  // $sql = ("SELECT `airports/airlines`.`id`, `tickets`.`ticket_id`, `tickets`.`airline_id`
  // FROM `airports/airlines`
  // INNER JOIN `tickets`
  // ON `airports/airlines`.`id` = `tickets`.`airline_id`");
  // $tickets = ['tickets'];
// Получаем данные из сессии и POST-запроса

$user_id = $_SESSION['user_id'];
$flight_id = $_POST['airline_id'];
$booking_date = date('Y-m-d H:i:s');
$seat_number = $random_data;

// Добавляем данные в таблицу booking
$sql = "INSERT INTO `bookings` (`user_id`, `flight_id`, `booking_date`, `seat_number`) VALUES ('$user_id', '$flight_id', '$booking_date', '$seat_number')";

if ($mysqli->query($sql) === TRUE) {
  echo "Booking created successfully";
} else {
  echo "Error creating booking: " . $mysqli->error;
}

// Добавляем данные в таблицу tickets
$sql = "INSERT INTO `tickets` (`user_id`, `flight_id`) VALUES ('$user_id', '$flight_id')";

$mysqli -> close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
</head>
<body>
<table action="SubmitInfo_php">
  <tr>
    <th>Flight ID</th>
    <th>Ticket ID</th>
    <th>Departure City</th>
    <th>Departure Airport</th>
    <th>Arrival City</th>
    <th>Arrival Airport</th>
    <th>Departure Date</th>
    <th>Departure Time</th>
    <th>Passenger Name</th>
    <th>Passenger Email</th>
    <th>Seat Number</th>
  </tr>
  <tr>
    <td><?php echo $airline_id;?></td>
    <td><?php 
    ?></td>
    <td>Riga</td>
    <td>Riga airport</td>
    <td><?php echo $City;?></td>
    <td><?php echo $airport_name;?></td>
    <td><?php echo $departure_date;;?></td>
    <td><?php echo $departure_time;?></td>
    <td><?php echo $_SESSION['username']?></td>
    <td><?php echo $_SESSION['email']?></td>
    <td><?php echo $random_data;?></td>
  </tr>

  <td>This is your ordered flight, enjoy ;)</td>
</table>
<li><a href="../index.php" action="SubmitInfo.php" name="order">Order Ticket</a></li>

<li><a href="pay.php">PAY!!!</a></li>
<style>
    table {
    border-collapse: collapse;
    width: 100%;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
  }
  
  th, td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }
  
  th {
    background-color: #4CAF50;
    color: white;
  }
  
  tr:nth-child(even) {
    background-color: #f2f2f2;
  }
  
  
  
  .airline {
    color: #0066ff;
  }
  
  .itada {
    text-transform: uppercase;
  }
  
  .t_price {
    color: #009933;
  }
  
  .arrival_date, .departure_date {
    font-size: 12px;
    color: #666;
  }
  
</style>
</body>
</html>

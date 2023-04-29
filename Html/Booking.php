<?php
session_start();

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
<table>
  <tr>
    <th>Flight ID</th>
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
    <td>Riga</td>
    <td>Riga airport</td>
    <td><?php echo $City;?></td>
    <td><?php echo $airport_name;?></td>
    <td><?php echo $departure_date;;?></td>
    <td><?php echo $departure_time;?></td>
    <td>John Doe</td>
    <td>john.doe@example.com</td>
    <td><?php echo $random_data;?></td>
  </tr>

  <td>This is your ordered flight, enjoy ;)</td>
</table>
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
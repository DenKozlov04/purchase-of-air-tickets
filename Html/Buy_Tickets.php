<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css\Buy_Tickets.css">
    <title>buy tickets</title>
</head>
<body>
</body>
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
  
  .airline, .airport_name, .itada, .city, .country, .t_price, .arrival_date, .departure_date {
    font-weight: bold;
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
</html>

<?php
// Подключение к базе данных
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'airflightsdatabase';

$mysqli = new mysqli($host, $user, $password, $database);

// Проверка соединения
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Удаление данных из таблицы и базы данных
if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $mysqli->query("DELETE FROM `airports/airlines` WHERE `id`=$id") or die($mysqli->error());
}

// Выполнение запроса
$result = $mysqli->query("SELECT * FROM `airports/airlines`");

// Проверка наличия результатов
if ($result->num_rows > 0) {
    // Вывод данных в таблицу HTML
    echo "<table>
        <tr>
          <th>Airline</th>
          <th>Airport Name</th>
          <th>ITADA Code</th>
          <th>City</th>
          <th>Country</th>
          <th>Ticket Price</th>
          <th>Arrival Date</th>
          <th>Departure Date</th>
          <th>Arrival time</th>
          <th>Departure time</th>
          <th>Action</th>
        </tr>";

    // Вывод каждой строки данных
    while($row = $result->fetch_assoc()) {
        echo "<tr>
          <td>".$row["Airline"]."</td>
          <td>".$row["airport_name"]."</td>
          <td>".$row["ITADA"]."</td>
          <td>".$row["City"]."</td>
          <td>".$row["country"]."</td>
          <td>".$row["T_price"]."</td>
          <td>".$row["arrival_date"]."</td>
          <td>".$row["departure_date"]."</td>
          <td>".$row["arrival_time"]."</td>
          <td>".$row["departure_time"]."</td>
          <td>
            <form method='POST' action='Buy_Tickets.php'>
              <input type='hidden' name='delete' value='".$row['id']."'>
              <button type='submit'>Delete</button>
            </form>
          </td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

// Закрытие соединения с базой данных
$mysqli->close();
?>


<?php
// Подключаемся к базе данных
$conn = mysqli_connect('localhost', 'root', '', 'airflightsdatabase');

// Если форма была отправлена, добавляем новый комментарий в базу данных
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    $created_at = date('Y-m-d H:i:s');
    
    $sql = "INSERT INTO comments (name, email, comment, created_at) VALUES ('$name', '$email', '$comment', '$created_at')";
    mysqli_query($conn, $sql);
    
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Получаем список комментариев
$sql = "SELECT * FROM comments ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);


// ...

// Если была отправлена форма удаления комментария
if (isset($_GET['id'])) {
    // Получаем id комментария из формы
    $comment_id = $_GET['id'];

    // Удаляем комментарий из базы данных
    $stmt = mysqli_prepare($conn, 'DELETE  FROM comments WHERE id = ?');
    mysqli_stmt_bind_param($stmt, 'i', $comment_id);
    mysqli_stmt_execute($stmt);

    // Перенаправляем пользователя на ту же страницу, чтобы обновить список комментариев
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// ...
?>

<!DOCTYPE html>
<html>
<head>
    <link href="reviews.css" rel="stylesheet">
    <title>Comments</title>
</head>
<body>
    <h1>Comments</h1>


    <h2>Add a Comment</h2>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="name">Your name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Your email:</label>
        <input type="email" id="email" name="email" required>

        <label for="comment">Your comment:</label>
        <textarea id="comment" name="comment" required></textarea>

        <button type="submit">Submit</button>
    </form>
</body>
</html>

<!-- Добавляем кнопку удаления к каждому комментарию -->
<ul class="comments-list">
        <?php foreach ($comments as $comment): ?>
        <li class="comment">
            <h3><?= $comment['name'] ?></h3>
            <small><?= $comment['email'] ?></small>
            <p><?= $comment['comment'] ?></p>
            <small><?= $comment['created_at'] ?></small>
            
            <?php echo '<a href="'. $_SERVER['PHP_SELF'] .'?id=' . $comment['id'] . '" >Delete</a>';?>


        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
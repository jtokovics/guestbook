<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $message = htmlspecialchars($_POST["message"]);

    $entry = "$name: $message\n";
    file_put_contents("messages.txt", $entry, FILE_APPEND);
}

$messages = file_exists("messages.txt") ? file("messages.txt") : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook</title>
</head>
<body>
    <h1>Guestbook</h1>
    <form method="post">
        <input type="text" name="name" placeholder="Your Name" required>
        <br>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <br>
        <button name="submit">Submit</button>
    </form>

    <h2>Messages:</h2>
    <ul>
        <?php
        foreach($messages as $msg) { echo "<li>" . htmlspecialchars($msg) . "</li>"; } 
        ?>
    </ul>
</body>
</html>
<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $message = $_POST['message'] ?? '';
    
    if ($name && $message) {
        addEntry($name, $message);
    }
    
    header('Location: /');
    exit;
}

$entries = getEntries();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mirrord Guestbook</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header img {
            max-width: 200px;
            margin-bottom: 20px;
        }
        .entry-form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        .entry {
            background: white;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        small {
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="images/mirrord.svg" alt="mirrord logo">
        <h1>PHP Guestbook with mirrord</h1>
    </div>

    <div class="entry-form">
        <h2>Add New Entry</h2>
        <form method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <textarea name="message" placeholder="Your Message" required></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>

    <h2>Entries</h2>
    <?php foreach ($entries as $entry): ?>
        <?php $entry = (array)$entry; ?>
        <div class="entry">
            <strong><?= htmlspecialchars($entry['name']) ?></strong>
            <p><?= htmlspecialchars($entry['message']) ?></p>
            <small><?= date('Y-m-d H:i:s', $entry['timestamp']) ?></small>
        </div>
    <?php endforeach; ?>
</body>
</html>

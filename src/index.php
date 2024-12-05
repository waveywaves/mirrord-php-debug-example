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
<html>
<head>
    <title>Guestbook</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        .entry { border-bottom: 1px solid #ccc; padding: 10px 0; }
        form { margin: 20px 0; }
        input, textarea { margin: 5px 0; padding: 5px; width: 100%; }
        button { padding: 10px; background: #007bff; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Guestbook</h1>
    
    <form method="POST">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>

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

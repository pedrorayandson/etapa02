<?php
include 'routes.php';

    $username = null;
    $password = null;
    $db = new PDO("sqlite: Site/forms/database.sqlite", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec(
      "CREATE TABLE IF NOT EXISTS questionario(
        id INT PRIMARY KEY,
        p1 TEXT,
        p2 TEXT
        p3 TEXT,
        p4 TEXT
        p5 TEXT,
    );");

foreach ($routes as $key => $value) {
    if ($_SERVER['REQUEST_URI'] == $key) {
        header('location: ' . $value);
    }
}
<?php
include 'routes.php';

    $db = new PDO("sqlite:database.sqlite");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS questionario(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        email TEXT NOT NULL,
        nome TEXT NOT NULL,
        p1 TEXT NOT NULL,
        p2 TEXT NOT NULL,
        p3 TEXT NOT NULL,
        p4 TEXT NOT NULL,
        p5 TEXT NOT NULL
    )";
    $db->exec($sql);

foreach ($routes as $key => $value) {
    if ($_SERVER['REQUEST_URI'] == $key) {
        header('location: ' . $value);
    }
}
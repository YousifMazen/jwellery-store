<?php

$host = "localhost";
$dbname = "store";
$username = "root";
$password = "";

// Create a MySQLi connection
$dbc = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($dbc->connect_error) {
    die("Database connection failed: " . $dbc->connect_error);
}

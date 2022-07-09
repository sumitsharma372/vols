<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "volsec";
$port = "3307";

$conn = mysqli_connect($hostname, $username, $password, $dbname, $port);

if (!$conn) {
    die("Failed to connect: " . mysqli_connect_error());
} else {
}

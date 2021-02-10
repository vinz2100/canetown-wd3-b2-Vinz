<?php
if (!headers_sent()) {
    header('Content-type: text/html; charset=UTF-8');
    }
$serverName="127.0.0.1";
$userName="root";
$password="";
$dbName="blog_proj";

$mysqli = new mysqli($serverName, $userName, $password, $dbName);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>
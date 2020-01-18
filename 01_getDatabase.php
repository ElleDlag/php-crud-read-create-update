<?php
/**
 * -1 impossible connect with database/database not exist
 * -2 any row saitsfy your SQL query request 
 */
header('Content-Type: application/json');
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "HotelDB";
// Connect
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection and view error -1, next return to break all
if ($conn -> connect_errno) {
echo json_encode(-1); 
return;
}
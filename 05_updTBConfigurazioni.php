<?php
/**
 * -1 not value for this variable
 * -2 proble with variables
 */
header('Content-Type: application/json');
include "01_getDatabase.php";
//ritorna i parametri POST richiamati dalle variabili listate
LIST($id,$title,$description) 
    = [
        $_POST['id'],
        $_POST['title'],
        $_POST['description']
    ];
if(!$id || !$title || !$description){
    echo json_encode(-1);
    return;
}
//ritorna tutto i parametri di post in formato json
//echo json_encode($_POST);

//solo dopo aver riempito le variabile con un valore
//mi connetto al DB per fare un INSERT

/* $servername = "localhost";
$username = "root";
$password = "root";
$dbname = "HotelDB";
// Connect
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection and view error -1, next return to break all
if ($conn -> connect_errno) {
echo json_encode(-2); 
return;
} */
//tecnica del prepare and bind
$sql = "
    UPDATE configurazioni 
    SET $title = ?, $description = ?
    WHERE id = ?
";


$ext = $conn->prepare($sql);
$ext->bind_param('ssi',$title, $description, $id); 

//alla fine della preparazione dei dati protteti anche dalle injections
//bisogna eseguire il risultato
$res = $ext->execute();

//qui va encodato il risultato per far fare la verifica a json
$conn->close();
echo json_encode($res)
?> 
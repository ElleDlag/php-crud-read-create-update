
<?php
include '01_getDatabase.php';
$configurazioni = [];
$sql = "
SELECT *, 
DATE_FORMAT(created_at,'%d/%m/%Y') AS creatoil,
DATE_FORMAT(updated_at,'%d/%m/%Y') AS updateil
FROM configurazioni
";
$res = $conn -> query($sql);
//if rows is true (more one rows)
/*if ($res -> num_rows > 0) {
while($configurazione = $res -> fetch_assoc()) {
$configurazioni[] = $configurazione;
}
}*/
//if rows is false less than one row
if ($res -> num_rows < 1) {
echo json_encode(-2); 
return;
}
while($configurazione = $res -> fetch_assoc()) {
$configurazioni[] = $configurazione;
}
$conn -> close();
echo json_encode($configurazioni);
?>
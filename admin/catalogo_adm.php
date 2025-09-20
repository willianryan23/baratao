<?php 
include "../includes/banco.php";

$sql = "SELECT * FROM produtos";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {
    echo "ID: " . $row["id"] . " - Nome: " . $row["nome"] . " - descrição: " . $row["descricao"] . "<br>";
}
?>
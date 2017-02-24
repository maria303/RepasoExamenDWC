<?php

$conn = mysqli_connect("localhost", "root", "", "jurassicpets");

$sql = "SELECT * FROM categoria";

$result = mysqli_query($conn, $sql);

$i=0;
while($row = mysqli_fetch_assoc($result)){
    $categorias[$i] = array("id"=>$row["id"], "nombre"=>array_map("utf8_encode", $row)["nombre"]);
    $i++;
}

echo json_encode($categorias);

mysqli_close($conn);

?>
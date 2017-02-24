<?php

$idCategoria = $_GET["id"];

$conn = mysqli_connect("localhost", "root", "", "jurassicpets");

$sql = "SELECT * FROM articulo WHERE categoria = $idCategoria";

$result = mysqli_query($conn, $sql);

$i=0;
while($row = mysqli_fetch_assoc($result)){
    $articulos[$i] = array("id"=>$row["id"], "nombre"=>array_map("utf8_encode", $row)["nombre"],
        "descripcion"=>array_map("utf8_encode", $row)["descripcion"], "imagen"=>$row["imagen"],
        "precio"=>$row["precio"], "categoria"=>$row["categoria"]);
    $i++;
}

echo json_encode($articulos);

mysqli_close($conn);

?>
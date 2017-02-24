<?php
session_start();

$nombre = $_POST["nombre"];
$password = $_POST["password"];

$conn = mysqli_connect("localhost", "root", "", "jurassicpets");

$sql = "SELECT * FROM usuarios WHERE nombre = '$nombre' AND password = '$password'";

$result = mysqli_query($conn, $sql);

$num_rows = mysqli_num_rows($result);

if($num_rows == "1"){
    $data = mysqli_fetch_array($result);
    $_SESSION["usuario"] = $data["nombre"];
    echo "1";
}else{
    echo "error";
}

mysqli_close($conn);


?>
<?php

$page = $_GET['page']; // get the requested page
$limit = $_GET['rows']; // get how many rows we want to have into the grid
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
$sord = $_GET['sord']; // get the direction

if(!$sidx) $sidx =1;

$conn = mysqli_connect("localhost", "root", "", "jurassicpets");

$sql = "SELECT COUNT(*) AS count FROM categoria";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$count = $row['count'];

if( $count >0 ) {
	$total_pages = ceil($count/$limit);
} else {
	$total_pages = 0;
}
if ($page > $total_pages) $page=$total_pages;
$start = $limit*$page - $limit; // do not put $limit*($page - 1)
$sql = "SELECT * FROM categoria ORDER BY $sidx $sord LIMIT $start , $limit";

$result = mysqli_query($conn, $sql);
$responce = new StdClass();
$responce->page = $page;
$responce->total = $total_pages;
$responce->records = $count;

$i=0;
while($row = mysqli_fetch_assoc($result)) {
    $responce->rows[$i]['id']=$row["id"];
    $responce->rows[$i]['cell']=array($row["id"], array_map("utf8_encode", $row)["nombre"]);
    $i++;
}        
echo json_encode($responce);

mysqli_close($conn);

?>
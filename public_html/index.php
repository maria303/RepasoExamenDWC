<?php
session_start();
if(isset($_SESSION["usuario"])){

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" media="screen" href="css/flick/jquery-ui-custom.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="jqgrid/css/ui.jqgrid.css" />

        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="jqgrid/js/i18n/grid.locale-es.js" type="text/javascript"></script>
        <script src="jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>
        <script src="js/myScript.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="categorias"></div>
        <br><br>
        <div id="articulos"></div>
        <br><br>
        <div>
            <table id="tableCategorias"></table>
            <div id="paginacionCategorias"></div>
        </div>
        <br><br>
        <div>
            <a href="php/logout.php" id="cerrarSesion">Cerrar sesión</a>
        </div>
    </body>
</html>
<?php

}else{
    header('Location: login.php');
}
?>
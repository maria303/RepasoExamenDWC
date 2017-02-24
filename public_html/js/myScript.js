$(document).ready(function(){
    
    $("#iniciarSesion").click(function(){
        nombre = $("#nombre").val();
        password = $("#password").val();
        $.ajax({
            type: "POST",
            url: "php/comprobarLogin.php",
            data: {nombre: nombre, password: password},
            success: function(data){
                if(data === "1"){
                    location.href = "index.php";
                }else{
                    alert("ERROR");
                }
            }
        });
    });
    
    $.ajax({
        type: "GET",
        url: "php/listarCategorias.php",
        dataType: "json",
        success: function(data){
            $.each(data, function(index, value){
                categoria = "<a href='#' id='"+value.id+"'>"+value.nombre+"</a><br>";
                $("#categorias").append(categoria);
            });
        }
    });
    
    $("#categorias").on("click", "a", function(){
        $("#articulos").children().remove();
        idCategoria = $(this).attr("id");
        $.ajax({
            type: "GET",
            url: "php/articulosCategoria.php?id='"+idCategoria+"'",
            dataType: "json",
            success: function(data){
                $.each(data, function(index, value){
                    articulo = "<div><h3>"+value.nombre+"</h3><h5>"+value.descripcion+"</h5></div>";
                    $("#articulos").append(articulo);
                });
            }
        });
    });
    
    jQuery("#tableCategorias").jqGrid({
        url:'php/categoriasJqgrid.php',
	datatype: "json",
        mtype: "GET",
   	colNames:['Id','Nombre'],
   	colModel:[
   		{name:'id',index:'id', width:55},
   		{name:'nombre',index:'nombre', width:300}		
   	],
   	rowNum:10,
   	rowList:[10,20,30],
   	pager: '#paginacionCategorias',
   	sortname: 'id',
    viewrecords: true,
    sortorder: "asc",
    caption:"Categorias"
    });
    
});
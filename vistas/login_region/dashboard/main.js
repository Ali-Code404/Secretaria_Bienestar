$(document).ready(function(){
    tablaPersonas = $("#tablaPersonas").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
          
        //Para cambiar el lenguaje a español
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });

    solicitudes = $("#solicitudes").DataTable({
        "columnDefs":[{
         "targets": -1,
         "data":null,
         "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
        }],
         
         //Para cambiar el lenguaje a español
     "language": {
             "lengthMenu": "Mostrar _MENU_ registros",
             "zeroRecords": "No se encontraron resultados",
             "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
             "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
             "infoFiltered": "(filtrado de un total de _MAX_ registros)",
             "sSearch": "Buscar:",
             "oPaginate": {
                 "sFirst": "Primero",
                 "sLast":"Último",
                 "sNext":"Siguiente",
                 "sPrevious": "Anterior"
              },
              "sProcessing":"Procesando...",
         }
     });
    
$("#btnNuevo").click(function(){
    $("#formPersonas").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nueva Persona");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});      
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    folio = fila.find('td:eq(1)').text();
    encargado = fila.find('td:eq(2)').text();
    servidor = fila.find('td:eq(3)').text();
    motivo = fila.find('td:eq(4)').text();
    status = fila.find('td:eq(5)').text();
    recomendaciones = fila.find('td:eq(6)').text();
    
    $("#folio").val(folio);
    $("#encargado").val(encargado);
    $("#servidor").val(servidor);
    $("#motivo").val(motivo);
    $("#status").val(status);
    $("#recomendaciones").val(recomendaciones);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar status");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablaPersonas.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formPersonas").submit(function(e){
    e.preventDefault();    
    folio = $.trim($("#folio").val());
    encargado = $.trim($("#encargado").val());
    servidor = $.trim($("#servidor").val());
    sucursal = $.trim($("#sucursal").val());
    status = $.trim($("#status").val());
    recomendaciones = $.trim($("#recomendaciones").val());    
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {folio:folio, encargado:encargado, servidor:servidor, sucursal:sucursal, status:status, recomendaciones:recomendaciones, id:id, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            folio = data[0].folio;
            encargado = data[0].encargado;
            servidor = data[0].servidor;
            sucursal = data[0].sucursal;
            status = data[0].status;
            recomendaciones = data[0].recomendaciones;
            if(opcion == 1){tablaPersonas.row.add([id,folio,encargado,servidor,sucursal,status,recomendaciones]).draw();}
            else{tablaPersonas.row(fila).data([id,folio,encargado,servidor,sucursal,status,recomendaciones]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});   


    
});

//AQUI INICIA OTRA COSA

$(document).ready(function(){
    tablaRegion = $("#tablaRegion").DataTable({
       "columnDefs":[{
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
        
        //Para cambiar el lenguaje a español
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
});


//TABLA VER USUARIOS PARA MODIFICARLOS
$(document).ready(function(){
    tablaUsuarios = $("#tablaUsuarios").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
        
        //Para cambiar el lenguaje a español
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }

    });
    $("#btn").click(function(){
        $("#formUsuarios").trigger("reset");
        $(".modal-header").css("background-color", "#1cc88a");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Nuevo Usuario");            
        $("#modalCRU").modal("show");        
        id=null;
        opcion = 1; //alta
    });      
        
    var fila; //capturar la fila para editar o borrar el registro
        
    //botón EDITAR    
    $(document).on("click", ".btnEditar", function(){
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        nombre = fila.find('td:eq(1)').text();
        sucursal = fila.find('td:eq(2)').text();
        telefono = fila.find('td:eq(3)').text();
        usuario = fila.find('td:eq(4)').text();
        
        $("#nombre").val(nombre);
        $("#sucursal").val(sucursal);
        $("#telefono").val(telefono);
        $("#usuario").val(usuario);
        opcion = 2; //editar
        
        $(".modal-header").css("background-color", "#4e73df");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar usuario");            
        $("#modalCRU").modal("show");  
        
    });
    
    //botón BORRAR
    $(document).on("click", ".btnBorrar", function(){    
        fila = $(this);
        id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3 //borrar
        var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
        if(respuesta){
            $.ajax({
                url: "bd/crudi.php",
                type: "POST",
                dataType: "json",
                data: {opcion:opcion, id:id},
                success: function(){
                    tablaUsuarios.row(fila.parents('tr')).remove().draw();
                }
            });
        }   
    });
        
    $("#formUsuarios").submit(function(e){
        e.preventDefault();    
        nombre = $.trim($("#nombre").val());
        sucursal = $.trim($("#sucursal").val());
        telefono = $.trim($("#telefono").val());
        usuario = $.trim($("#usuario").val());    
        $.ajax({
            url: "bd/crudi.php",
            type: "POST",
            dataType: "json",
            data: {nombre:nombre, sucursal:sucursal,telefono:telefono, usuario:usuario, id:id, opcion:opcion},
            success: function(data){  
                console.log(data);
                id = data[0].id;            
                nombre = data[0].nombre;
                sucursal = data[0].sucursal;
                telefono = data[0].telefono;
                usuario = data[0].usuario;
                if(opcion == 1){tablaUsuarios.row.add([id,nombre,sucursal,telefono,usuario]).draw();}
                else{tablaUsuarios.row(fila).data([id,nombre,sucursal,telefono,usuario]).draw();}            
            }        
        });
        $("#modalCRU").modal("hide");    
        
    });   
});

















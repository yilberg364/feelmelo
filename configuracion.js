//Funcion para, mostrar el modal, y enviarle los datos para editar
$(document).ready(function () {
    // Agrega un evento clic a todas las filas de la tabla
    $("#btnEditarMiCuenta").on('click', function(){
    // Obtiene los datos de la fila clicada

    $('#tablaMiCuenta tbody tr', function () {
       var idUsuario = $(this).find('td:eq(0)').text();
       var nombreUsuario = $(this).find('td:eq(1)').text();
       var correoUsuario = $(this).find('td:eq(2)').text();
       var generoUsuario = $(this).find('td:eq(3)').text();
       var fechaNacimiento = $(this).find('td:eq(4)').text();                   
  
    // Configura el contenido del modal con los datos de la fila
        $('#Usuario_id').val(Usuario_id);
        $('#nombreUsuario').val(nombreUsuario);
        $('#correoUsuario').val(correoUsuario);
        $('#generoUsuario').val(generoUsuario);
        $('#fechaNacimiento').val(fechaNacimiento);
  
       // Abre el modal
       $('#modaMiCuenta').modal('show');
    });
 });
});

//Funcion para, mostrar el modal, y enviarle los datos para eliminar
$(document).ready(function () {
    // Agrega un evento clic a todas las filas de la tabla
    $("#btnEliminarMiCuenta").on('click', function(){
    // Obtiene los datos de la fila clicada

    $('#tablaMiCuenta tbody tr', function () {
       var idUsuarioEliminar = $(this).find('td:eq(0)').text();                   
  
    // Configura el contenido del modal con los datos de la fila
        $('#idUsuarioEliminar').val(idUsuarioEliminar);

  
       // Abre el modal
       $('#modalEliminarCuenta').modal('show');
    });
 });
});
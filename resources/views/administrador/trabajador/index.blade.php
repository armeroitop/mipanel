@extends('admin_panel.admin')

@section('sidebar_menu')
    @include('administrador.partials.panel_iz')
@endsection

@section('modals')
    @include('administrador.trabajador.partials.modals')
@endsection

@section('content')

    <div  class="row">       
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listado de trabajadores </h3>
                <button type="button" class="btn btn-success float-sm-right" data-toggle="modal" data-target="#modal-nuevoTrabajador">
                    nuevo Trabajador
                </button>                
            </div>            
            <!-- /.card-header -->
            <div class="card-body">
            <table id="tablaIndexTrabajador" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Dni o Nie</th>
                        <th>Fecha nacimiento</th>  
                        <th>&nbsp;</th>  
                    </tr>
                </thead>     
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->



@endsection

@section('script')
        
    <script>                
    //Manipula la DATATABLE
    $(document).ready(function() {
        $('#tablaIndexTrabajador').DataTable({
            "serverSide": true,                    
            "ajax": "{{ url('api/persona') }}", 
            "order": [[ 0, "desc" ]],
            "pagingType": "simple_numbers", 
            "columns": [
                {data: 'id'},
                {data: 'nombre'},
                {data: 'apellidos'},
                {data: 'dni'},
                {data: 'fecha_nacimiento'},
                {data: 'columna_botones'},                
            ], 
            language: {
                sprocessing:    "Procesando...",
                search:         "Buscar&nbsp;:",
                lengthMenu:     "Muestra _MENU_ elementos",
                info:           "Mostrando del _START_ al _END_; de _TOTAL_ elementos",
                infoEmpty:      "Mostrando del _START_ al _END_; de _TOTAL_ elementos",
                infoFiltered:   "(filtrado de _MAX_ elementos en total)",
                infoPostFix:    "",
                loadingRecords: "Cargando...",
                zeroRecords:    "Ningún elemento coincide con la busqueda",
                emptyTable:     "No hay datos disponibles en la tabla",
                paginate: {
                    first:      "Primero",
                    previous:   "Anterior",
                    next:       "Siguiente",
                    last:       "Último"
                },
                aria: {
                    sortAscending:  ": active para ordenar la columna en orden ascendente",
                    sortDescending: ": active para ordenar la columna en orden descendente"
                }
                
            },                      
        }); /* fin DATATABLE */  
  
    });  

    
    function editTrabajador(id,nombre,apellidos,dni,fecha_nacimiento,){
             
        var url_update = '{{ route("persona.update", ":id") }}';
        url_update = url_update.replace(':id', id);
        //console.log(url_update)
        $("#updateTrabajadorForm").attr('action', url_update);   
 
        $("#edit_nombre").val(nombre);
        $("#edit_apellidos").val(apellidos);
        $("#edit_dni").val(dni);
        $("#edit_fecha_nacimiento").val(fecha_nacimiento);         
    } 

    function eliminaTrabajador(id,nombre,apellidos){
        
        var url = '{{ route("persona.destroy", ":id") }}';
        url = url.replace(':id', id);
       
        $("#deleteForm").attr('action', url);   

        $("#cuertpoTexto").text(nombre);
        $("#cuerpoDescripcion").text(apellidos);                               

    }

    function formSubmit()
    {               
        $("#deleteForm").submit();
    }

    

    /* Este codigo impide que el form se envie automaticamente si pulsamos Enter */
    $('#modal-eliminaTrabajador').keydown(function(e) {
        if (e.which == 13)        
            event.preventDefault(); 
    });
    $('#modal-nuevoTrabajador').keydown(function(e) {
        if (e.which == 13)        
            event.preventDefault(); 
    });
    $('#modal-editTrabajador').keydown(function(e) { 
        if (e.which == 13)        
            event.preventDefault();  
    });
    
        
    </script>
    
@endsection
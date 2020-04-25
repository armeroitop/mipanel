@extends('admin_panel.admin')

@section('sidebar_menu')
    @include('administrador.partials.panel_iz')
@endsection

@section('modals')
    @include('administrador.rol.partials.modals')
@endsection

@section('content')

    <div  class="row">       
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable </h3>
                <button type="button" class="btn btn-success float-sm-right" data-toggle="modal" data-target="#modal-nuevoRol" onclick="cargaPermisos()">
                    nuevo Rol
                </button>                
            </div>            
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tablaIndexRol" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Slug</th>
                            <th>Descripción</th>                          
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
        $('#tablaIndexRol').DataTable({
            "serverSide": true,                    
            "ajax": "{{ url('api/rol') }}", 
            "order": [[ 0, "desc" ]],
            "pagingType": "simple_numbers", 
            "columns": [
                {data: 'id'},
                {data: 'name'},
                {data: 'slug'},
                {data: 'description'},                
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
   

    $('#checkbox_acceso0').change(function() {
        
        $('#acceso1').prop('disabled', !this.checked);
        $('#acceso1').prop('checked', false);

        $('#acceso2').prop('disabled', !this.checked);
        $('#acceso2').prop('checked', false);
    });
    $('#edit_checkbox_acceso0').change(function() {
        
        $('#edit_acceso1').prop('disabled', !this.checked);
        $('#edit_acceso1').prop('checked', false);

        $('#edit_acceso2').prop('disabled', !this.checked);
        $('#edit_acceso2').prop('checked', false);
    });

    //Este metodo carga los permisos en el modal de CREAR ROL
    function cargaPermisos(){
        $.ajax({
           type: 'GET',
           url: '/api/rol/create' ,            
        }).then(function (data) {  
            $('#tablaPermisos').empty();          
            data.forEach(element => {
                console.log(element.description);
                /* $('#listaPermisos').append('<div><label class="bo bp"><input type="checkbox">Test' + element.description + '</label></div>'); */
               /*  $('#listaPermisos').append('<div class="icheck-primary"><input  id="'+ element.id +'" type="checkbox"> \
                    <label for="'+ element.id +'"> '+ element.name +' <i>('+ element.description +')</label></div>'); */
                $('#tablaPermisos').append('<tr>\
                        <td><div class="icheck-primary"><input  id="'+ element.id +'" value="'+ element.id +'" name="permisos[]" type="checkbox"><label for="'+ element.id +'"></label></div></td> \
                        <td>'+ element.name +'</td>\
                        <td>'+ element.slug +'</td>\
                        <td>'+ element.description +'</td></tr>  ');
            });                        
            
        }).fail( function() {
            console.log('failRolCreate');           
        }); 
    }
   
    //Este metodo carga los permisos en el modal de EDIT ROL
    function editRol(id,name,slug,description){
             
        var url_update = '{{ route("rol.update", ":id") }}';
        url_update = url_update.replace(':id', id);
        //console.log(url_update)
        $("#updateRolForm").attr('action', url_update);   
 
        $("#edit_id").val(id);
        $("#edit_nombre").val(name);
        $("#edit_slug").val(slug);
        $("#edit_description").val(description);

        var rutaEditRol = '{{ route("rol.edit", ":id") }}';
        rutaEditRol = rutaEditRol.replace(':id', id);
        console.log(rutaEditRol); 
        $.ajax({
           type: 'GET',
           url: rutaEditRol ,            
        }).then(function (data) { 
            $('#edit_checkbox_acceso0').prop('checked', false);
            if(data[2] == 'all-access' ){
                $('#edit_checkbox_acceso0').prop('checked', true);
                $('#edit_acceso1').prop('disabled', false);
                $('#edit_acceso1').prop('checked', true);
                
            }else if(data[2] == 'no-access'){
                $('#edit_checkbox_acceso0').prop('checked', true);
                $('#edit_acceso2').prop('disabled', false);
                $('#edit_acceso2').prop('checked', true);
            }else{
                $('#edit_checkbox_acceso0').prop('checked', false);
                $('#edit_acceso1').prop('disabled', true);
                $('#edit_acceso1').prop('checked', false);
                $('#edit_acceso2').prop('disabled', true);
                $('#edit_acceso2').prop('checked', false);                
            }
            

            $('#edit_tablaPermisos').empty();
            console.log(data[2]); 
            data[1].forEach(element => {
                if(data[0].includes(element.id)){
                    $('#edit_tablaPermisos').append('<tr>\
                        <td><div class="icheck-primary"><input  id="'+ element.id +'" value="'+ element.id +'" name="permisos[]" type="checkbox" checked><label for="'+ element.id +'"></label></div></td> \
                        <td>'+ element.name +'</td>\
                        <td>'+ element.slug +'</td>\
                        <td>'+ element.description +'</td></tr>  ');
                }else{
                    $('#edit_tablaPermisos').append('<tr>\
                        <td><div class="icheck-primary"><input  id="'+ element.id +'" value="'+ element.id +'" name="permisos[]" type="checkbox" ><label for="'+ element.id +'"></label></div></td> \
                        <td>'+ element.name +'</td>\
                        <td>'+ element.slug +'</td>\
                        <td>'+ element.description +'</td></tr>  ');
                }     
            });

            delete data;                   
            
        }).fail( function() {
            console.log('failRolCreate');           
        });                  
    } 
    

    function eliminaRol(id,name,slug){
        
        var url = '{{ route("rol.destroy", ":id") }}';
        url = url.replace(':id', id);
       
        $("#deleteForm").attr('action', url);   

        $("#cuertpoTexto").text(name);
        $("#cuerpoDescripcion").text(slug);                               

    }

    function formSubmit(){               
        $("#deleteForm").submit();
    }

    

    /* Este codigo impide que el form se envie automaticamente si pulsamos Enter */
    $('#modal-eliminaRol').keydown(function(e) {
        if (e.which == 13)        
            event.preventDefault(); 
    });
    $('#modal-nuevoRol').keydown(function(e) {
        if (e.which == 13)        
            event.preventDefault(); 
    });
    $('#modal-editRol').keydown(function(e) { 
        if (e.which == 13)        
            event.preventDefault();  
    });
    
        
    </script>
    
@endsection
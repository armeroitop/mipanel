@extends('admin_panel.admin')

@section('sidebar_menu')
    @include('administrador.partials.panel_iz')
@endsection

@section('modals')
    @include('administrador.usuario.partials.modals')
@endsection

@section('content')

    <div  class="row">       
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable </h3>
                <button type="button" class="btn btn-success float-sm-right" data-toggle="modal" data-target="#modal-nuevoUsuario" ">
                    nuevo Usuario
                </button>                
            </div>            
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tablaIndexUsuario" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>                          
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
        $('#tablaIndexUsuario').DataTable({
            "serverSide": true,                    
            "ajax": "{{ url('api/usuario') }}", 
            "order": [[ 0, "desc" ]],
            "pagingType": "simple_numbers", 
            "columns": [
                {data: 'id'},
                {data: 'name'},
                {data: 'email'},
                {data: 'roles', orderable: false, searchable: false},                
                {data: 'columna_botones', orderable: false, searchable: false},                
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
 
   
    //Este metodo carga los usuarios en el modal de EDIT USUARIO
    function editUsuario(id,name,email){
             
        var url_update = '{{ route("usuario.update", ":id") }}';
        url_update = url_update.replace(':id', id);
        //console.log(url_update)
        $("#updateUsuarioForm").attr('action', url_update);   
 
       
        $("#edit_nombre").val(name);
        $("#edit_email").val(email);
        

        var rutaEditUsuario = '{{ route("usuario.edit", ":id") }}';
        rutaEditUsuario = rutaEditUsuario.replace(':id', id);
        console.log(rutaEditUsuario); 
        $.ajax({
           type: 'GET',
           url: rutaEditUsuario ,            
        }).then(function (data) { 
           
            console.log(data);
            $('#edit_tablaRoles').empty();
            
            data[0].forEach(element => {
                
                if(data[1].includes(element.id)){                    
                    $('#edit_tablaRoles').append('<tr>\
                        <td><div class="icheck-primary"><input  id="'+ element.id +'" value="'+ element.id +'" name="roles[]" type="checkbox" checked ><label for="'+ element.id +'"></label></div></td> \
                        <td>'+ element.name +'</td>\
                        <td>'+ element.description +'</td></tr>  ');
                }else{
                    $('#edit_tablaRoles').append('<tr>\
                        <td><div class="icheck-primary"><input  id="'+ element.id +'" value="'+ element.id +'" name="roles[]" type="checkbox"  ><label for="'+ element.id +'"></label></div></td> \
                        <td>'+ element.name +'</td>\
                        <td>'+ element.description +'</td></tr>  ');
                }    
            });

            delete data;   
            
        }).fail( function() {
            console.log('failUsuarioCreate');           
        });                  
    } 
    

    function eliminaUsuario(id,name,slug){
        
        var url = '{{ route("usuario.destroy", ":id") }}';
        url = url.replace(':id', id);
       
        $("#deleteForm").attr('action', url);   

        $("#cuertpoTexto").text(name);
        $("#cuerpoDescripcion").text(slug);                               

    }

    function formSubmit(){               
        $("#deleteForm").submit();
    }

    

    /* Este codigo impide que el form se envie automaticamente si pulsamos Enter */
    $('#modal-eliminaUsuario').keydown(function(e) {
        if (e.which == 13)        
            event.preventDefault(); 
    });
    $('#modal-nuevoUsuario').keydown(function(e) {
        if (e.which == 13)        
            event.preventDefault(); 
    });
    $('#modal-editUsuario').keydown(function(e) { 
        if (e.which == 13)        
            event.preventDefault();  
    });
    
        
    </script>
    
@endsection
@extends('admin_panel.admin')

@section('sidebar_menu')
    @include('administrador.partials.panel_iz')
@endsection

@section('modals')
    @include('administrador.partials.modals')
@endsection

@section('content')

    <div  class="row">       
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
                <button type="button" class="btn btn-success float-sm-right" data-toggle="modal" data-target="#modal-nuevaObra">
                    nueva Obra
                </button>                
            </div>            
            <!-- /.card-header -->
            <div class="card-body">
            <table id="tablaIndexObra" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Dirección</th>
                        <th>Proyecto</th>  
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
        {{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>--}}
         
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> --}} 
    <script>                
    //Manipula la DATATABLE
    $(document).ready(function() {
        $('#tablaIndexObra').DataTable({
            "serverSide": true,                    
            "ajax": "{{ url('api/obra') }}", 
                /* headers: {
                        'CSRFToken': {{ csrf_token() }}
                        }, */ 
            "columns": [
                {data: 'id'},
                {data: 'nombre'},
                {data: 'descripcion'},
                {data: 'direccion'},
                {data: 'proyecto'},
                {data: 'columna_botones'},
            ], 
            language: {
                sprocessing:    "Tratamiento en curso...",
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
        }); 
    });  /* fin DATATABLE */  

        
    function eliminaObra(id,nombre,descripcion){
        //console.log('elimina una obra'+id)
        var id = id;
        var nombre = nombre;
        var desc = descripcion;
        var url = '{{ route("obra.destroy", ":id") }}';
        url = url.replace(':id', id);
        //$("#cuertpoTexto").html = "<p>some text</p>";
        $("#deleteForm").attr('action', url);   

        $("#cuertpoTexto").text(nombre);
        $("#cuerpoDescripcion").text(descripcion);                               

    }
    function formSubmit()
    {               
        $("#deleteForm").submit();
    }


            
    $(document).ready(function() {
        //Initialize Select2 Elements
        $('#selec2Promotor').select2({
            theme: 'bootstrap4',
            placeholder: "Selecciona un promotor",
            allowClear: true,
            minimumInputLength: 2, 
            ajax:{
                url:"/api/obra/create",
                type: "GET",
                dataType: "json",
                delay: 250,
                cache: true,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {                    
                    params.page = params.page || 1;
                    return {
                        results: data,
                        pagination: {more: (params.page * 10) < data.total_count}                       
                    };    
                }, 
            },//fin ajax    
        });//Fin Selec2 selec2Promotor

        $('#selec2Localidad').select2({
            theme: 'bootstrap4',
            placeholder: "Selecciona un municipio",
            allowClear: true,
            minimumInputLength: 2, 
            ajax:{
                url:"/api/localidad/create",
                type: "GET",
                dataType: "json",
                delay: 250,
                cache: true,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {                    
                    params.page = params.page || 1;
                    return {
                        results: data,
                        pagination: {more: (params.page * 10) < data.total_count}                       
                    };    
                }, 
            },//fin ajax    
        });//Fin Selec2 selec2Localidad



    });//fin $(document).ready(function()
    
    

    /* Este codigo impide que el form se envie automaticamente si pulsamos Enter */
    $('#creaObraForm').keydown(function(e) {
        //alert('uno');
        var key = e.which;
        //alert(key);      
        if (key == 13) {
        //alert('para');
        // As ASCII code for ENTER key is "13"
            event.preventDefault();
        //return false;
        //$('#creaObraForm').submit(); // Submit form code
        }
    });

    
        
    </script>
    
@endsection
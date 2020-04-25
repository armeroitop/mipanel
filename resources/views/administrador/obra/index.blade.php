@extends('admin_panel.admin')

@section('sidebar_menu')
    @include('administrador.partials.panel_iz')
@endsection

@section('modals')
    @include('administrador.obra.partials.modals')
@endsection

@section('content')

    <div  class="row">       
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable </h3>
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
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>         
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> --}} 
    <script>                
    //Manipula la DATATABLE
    $(document).ready(function() {
        $('#tablaIndexObra').DataTable({
            "serverSide": true,                    
            "ajax": "{{ url('api/obra') }}", 
            "order": [[ 0, "desc" ]],
            "pagingType": "simple_numbers", 
            "columns": [
                {data: 'id'},
                {data: 'nombre'},
                {data: 'descripcion'},
                {data: 'direccion'},
                {data: 'proyecto'},
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
        
        //Initialize Select2 Elements
        $('#selec2Promotor').select2({
            theme: 'bootstrap4',
            placeholder: "Selecciona un promotor",
            allowClear: true,
            minimumInputLength: 2, 
            ajax:{
                //url:"/api/obra/create",
                url:"/api/empresa/create",
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

        //Initialize Select2 Elements
        $('#edit_selec2Promotor').select2({
            theme: 'bootstrap4',
            placeholder: "Selecciona un promotor",
            allowClear: true,
            minimumInputLength: 2, 
            ajax:{                
                url:"/api/empresa/create",
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

        $('#edit_selec2Localidad').select2({
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

    });  
   

    function editObra(id,nombre,descripcion,direccion,proyecto,localidad_id,inicio_previsto,fin_previsto){
         
        //console.log('edita una empresa '+id)
        var id = id;
        //var nombre = JSON.parse(nombre);
        //var descripcion = JSON.parse(descripcion);
        //var direccion = JSON.parse(direccion);
        //var nombre = nombre;       
        var url_update = '{{ route("obra.update", ":id") }}';
        url_update = url_update.replace(':id', id);
        //console.log(url_update)
        $("#updateObraForm").attr('action', url_update);   
 
        $("#edit_nombre").val(nombre.replace(/['"]+/g, ''));
        $("#edit_descripcion").val(descripcion.replace(/['"]+/g, ''));
        $("#edit_direccion").val(direccion.replace(/['"]+/g, ''));
        $("#edit_inicio_previsto").val(inicio_previsto);
        $("#edit_fin_previsto").val(fin_previsto);
        
        if(proyecto==1){          
            $("#edit_radioPrimary1").prop("checked", true);           
        }else{            
            $("#edit_radioPrimary2").prop("checked", true);
        }
         

        // Recargamos al Promotor en el Select2
        var promotorSelect = $('#edit_selec2Promotor');
        
        var rutaShowPromotor = '{{ route("obra.show", ":id") }}';
        rutaShowPromotor = rutaShowPromotor.replace(':id', id);
        
        $.ajax({
           type: 'GET',
           url: rutaShowPromotor ,            
        }).then(function (data) { 
            console.log('data Promotor : '+data[0].text+data[0].id);           
            var optionPromotor = new Option(data[0].text, data[0].id, true, true);            
            promotorSelect.append(optionPromotor).trigger('change');
                        
            // manually trigger the `select2:select` event
            promotorSelect.trigger({
                type: 'select2:select',
                params: {
                    data: data
               }
           });
        }).fail( function() {
            console.log('failPromotor');           
        }); 


        // Recargamos la localidad en el Select2
        var localidadSelect = $('#edit_selec2Localidad');
    
        var rutaShowLocalidad = '{{ route("localidad.show", ":localidad_id") }}';
        if (!localidad_id) localidad_id=0;
        rutaShowLocalidad = rutaShowLocalidad.replace(':localidad_id', localidad_id);
        console.log(rutaShowLocalidad);
        $.ajax({
            type: 'GET',
            url: rutaShowLocalidad ,            
        }).then(function (data) {   
            console.log('data Localiadad: '+data);         
            var optionLocalidad = new Option(data[0].text, data[0].id, true, true);            
            localidadSelect.append(optionLocalidad).trigger('change');
                  
            // manually trigger the `select2:select` event
            localidadSelect.trigger({
                 type: 'select2:select',
                 params: {
                     data: data
                }
            });
        }).fail( function() {
            console.log('failLocalidad');          
        }); 
    } 

        
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

    

    /* Este codigo impide que el form se envie automaticamente si pulsamos Enter */
    $('modal-eliminaObra').keydown(function(e) {
        if (e.which == 13)        
            event.preventDefault(); 
    });
    $('modal-nuevaObra').keydown(function(e) {
        if (e.which == 13)        
            event.preventDefault(); 
    });
    $('#modal-editObra').keydown(function(e) { 
        if (e.which == 13)        
            event.preventDefault();  
    });
    
        
    </script>
    
@endsection
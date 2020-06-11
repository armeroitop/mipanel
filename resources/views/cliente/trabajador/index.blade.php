@extends('admin_panel.admin')

@section('sidebar_menu')
    @include('cliente.partials.panel_iz')
@endsection

@section('modals')
    @include('administrador.trabajador.partials.modals')
@endsection

@section('content')

    <div  class="row">       
      <div class="col-12">
        @foreach ($empresas as $empresa)
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Listado de trabajadores de {{$empresa->nombre}}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-success float-sm-left" data-toggle="modal" data-target="#modal-nuevoTrabajador">nuevo Trabajador</button>
                    <button class="btn btn-tool" type="button" data-card-widget="collapse"><i class="fas fa-minus"></i></button>                    
                    <button class="btn btn-tool" type="button" data-card-widget="remove"><i class="fas fa-times"></i></button>                    
                </div>                 
            </div>            
            <!-- /.card-header -->
            <div class="card-body">
            <table id="tablaIndexTrabajador{{$empresa->id}}" class="table table-bordered table-striped">
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
                <tbody>             
                    @for ($i = 0; $i < $trabajadores->count(); $i++)
                    @if ($contratos[$i] == $empresa->id)
                        <tr>                                
                            <td>{{$trabajadores[$i]->id}}</td>
                            <td>{{$trabajadores[$i]->nombre}}</td>
                            <td>{{$trabajadores[$i]->apellidos}}</td>
                            <td>{{$trabajadores[$i]->dni}}</td>
                            <td>{{$trabajadores[$i]->fecha_nacimiento}}</td>
                            <td></td>
                        </tr> 
                    @endif
                    @endfor    
                         
                   
                </tbody>     
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        @endforeach
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

{{$empresas}}
<br>
{{$contratos}}
<br>
{{$trabajadores}}

@endsection

@section('script')
        
    <script>                
    //Manipula la DATATABLE
    $(document).ready(function() {
        var empresas = {!! $empresas !!};
       
        empresas.forEach(element => {
            $('#tablaIndexTrabajador'+element.id).DataTable({            
                "language": {
                        "search":        "Buscar&nbsp;:",
                        "lengthMenu":    "Muestra _MENU_ trabajadores",
                        "zeroRecords":   "Ningún elemento coincide con la busqueda",
                        "info":          "Mostrando del _START_ al _END_; de _TOTAL_ trabajadores",
                        "infoEmpty":     "No existen resultados",
                        "infoFiltered":  "(filtrado de _MAX_ elementos en total)",
                        paginate: {
                            first:      "Primero",
                            previous:   "Anterior",
                            next:       "Siguiente",
                            last:       "Último"
                        },
                    }                    
            }); /* fin DATATABLE */  
        });
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
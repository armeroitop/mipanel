@extends('admin_panel.admin')

@section('sidebar_menu')
    @include('cliente.partials.panel_iz')
@endsection

@section('modals')
   {{--  @include('administrador.empresa.partials.modals') --}}
@endsection

@section('content')

    <div  class="row">       
      <div class="col-12">
        @foreach ($empresas as $empresa)
                      
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Listado de obras de {{$empresa->nombre}}</h3>
                <div class="card-tools">
                <button class="btn btn-tool" type="button" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                <button class="btn btn-tool" type="button" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
              </div>
                                
            </div><!-- /.card-header -->                        
            

            
            <div class="card-body">
                <table id="tablaObraActiva{{$empresa->id}}" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Obra</th>
                            <th>Contratante</th>
                            <th>Dirección</th>
                            <th>Localidad</th>  
                            <th>&nbsp;</th>  
                        </tr>
                    </thead>   
                    <tbody> 
                        @foreach ($empresa->subcontrataciones as $subcontratacion)
                            <tr>                                
                                <td>{{$subcontratacion->obra->id}}</td>
                                <td>{{$subcontratacion->obra->nombre}}</td>
                                <td>{{$subcontratacion->contratante->nombre}}</td>
                                <td>{{$subcontratacion->obra->localidad->nombre}}</td>
                                <td>{{$subcontratacion->obra->direccion}}</td>
                                <td>{{$subcontratacion->obra->direccion}}</td>
                            </tr>  
                        @endforeach
                    </tbody>  
                </table>
            </div><!-- /.card-body -->
            

          
        </div>  @endforeach
        <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  {{-- {{$empresas}} --}}


@endsection

@section('script')
<script>
    $(document).ready(function() {

        var empresas = {!! $empresas !!};
       
        empresas.forEach(element => {
             console.log(element.id);
             $('#tablaObraActiva'+element.id).DataTable({
                "language": {
                    "search":        "Buscar&nbsp;:",
                    "lengthMenu":    "Muestra _MENU_ obras",
                    "zeroRecords":   "Ningún elemento coincide con la busqueda",
                    "info":          "Mostrando del _START_ al _END_; de _TOTAL_ obras",
                    "infoEmpty":     "No existen resultados",
                    "infoFiltered":  "(filtrado de _MAX_ elementos en total)",
                    paginate: {
                        first:      "Primero",
                        previous:   "Anterior",
                        next:       "Siguiente",
                        last:       "Último"
                    },
                }  
            });
        });

        
    });// fin de  $(document).ready(function()

</script>
    
@endsection
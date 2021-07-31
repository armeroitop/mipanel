@extends('admin_panel.admin')

@section('sidebar_menu')
    @include('panel.partials.panel_iz')
@endsection

@section('modals')
   {{--  @include('administrador.empresa.partials.modals') --}}
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6">
            <h1>Resumen de obras activas</h1>
            </div>

            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">                
                <li class="breadcrumb-item"><a href="{{route('obra.css')}}">Obra</a></li>
                <li class="breadcrumb-item active">Obras activas</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <div  class="row">       
      <div class="col-12">
                             
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Listado de obras</h3>
                <div class="card-tools">
                    <button class="btn btn-tool" type="button" data-card-widget="collapse"><i class="fas fa-minus"></i></button>                    
                    <button class="btn btn-tool" type="button" data-card-widget="remove"><i class="fas fa-times"></i></button>                    
                </div>                                
            </div><!-- /.card-header -->                        
            

            
            <div class="card-body">
                <table id="tablaObraActiva" class="table table-bordered table-striped">
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
                        @foreach ($obras as $obra)
                            <tr>                                
                                <td>{{$obra->id}}</td>
                                <td>{{$obra->nombre}}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>@include('panel.obracss.partials.botonesDT')</td>
                            </tr>  
                        @endforeach
                    </tbody>  
                </table>
            </div><!-- /.card-body -->
            

          
        </div>  
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
        $('#tablaObraActiva').DataTable({
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
       

        /* $( "#li_Obras" ).removeClass( "menu-close" ).addClass( "menu-open" );
        $( "#a_Obras" ).addClass( "active" );
        $( "#a_Obras_activas" ).addClass( "active" ); */
        
    });// fin de  $(document).ready(function()

</script>
    
@endsection
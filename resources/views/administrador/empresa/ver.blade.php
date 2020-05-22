@extends('admin_panel.admin')

@section('styles')
<style>  </style>    
@endsection

@section('sidebar_menu')
    @include('administrador.partials.panel_iz')
@endsection

@section('modals')
   
@endsection

@section('content')

    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6">
            <h1>Empresa</h1>
            </div>

            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('paneladmin/empresa')}}">Empresas</a></li>
                <li class="breadcrumb-item active">{{$empresa->nombre}}</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">

        <div class="container-fluid">
          <!-- row -->
          <div class="row">
            <div class="col-12">
              <!-- jQuery Knob -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fa fa-chart-bar"></i>
                    Trabajadores de {{$empresa->nombre}}
                  </h3>
    
                  <div class="card-tools">
                    <button class="btn btn-tool" type="button" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button class="btn btn-tool" type="button" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="card-body table-responsive p-0">
                      <table id="datatable_trabajadores" class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>DNI o Nie</th>
                            <th>Acción</th>
                          </tr>
                        </thead>
                        <tbody>                        
                          @foreach ($trabajadores as $trabajador)
                            <tr>
                              <td>{{$trabajador->id}}</td>
                              <td>{{$trabajador->nombre}}</td>
                              <td>{{$trabajador->apellidos}}</td>
                              <td>{{$trabajador->dni}}</td>
                              <td>boton</td>
                            </tr> 
                          @endforeach                         
                          
                        </tbody>
                      </table>
                    </div>
                  </div><!-- /.row -->   
                  
                </div><!-- /.card-body -->            
              </div><!-- /.card -->          
            </div><!-- /.col -->        
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        {{$trabajadores}}
        
    
      </section>


@endsection


@section('script')
<script>                
  $(document).ready(function() {
    
    $('#datatable_trabajadores').DataTable({

      "language": {
          "search":        "Buscar&nbsp;:",
          "lengthMenu":    "Muestra _MENU_ elementos",
          "zeroRecords":   "Ningún elemento coincide con la busqueda",
          "info":          "Mostrando del _START_ al _END_; de _TOTAL_ elementos",
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

</script>

@endsection
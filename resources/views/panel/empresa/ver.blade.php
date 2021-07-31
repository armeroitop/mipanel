@extends('admin_panel.admin')

@section('styles')
<style>  </style>    
@endsection

@section('sidebar_menu')
    @include('panel.partials.panel_iz')
@endsection

@section('modals')
  @include('panel.trabajador.partials.modals')
@endsection

@section('content')

    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6">
            <h1>{{$empresa->nombre}}</h1>
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
                     <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-altaTrabajador" onclick="altaTrabajador({{$empresa->id}})">
                      Alta trabajador
                    </button>                  
                    <button class="btn btn-tool" type="button" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button class="btn btn-tool" type="button" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                    
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    
                  </div>
                  <div class="row">
                    <div class="card-body table-responsive p-0">
                      <table id="datatable_trabajadores" class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th style="width:10px">Id.</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>DNI o Nie</th>
                            <th>Acción</th>
                          </tr>
                        </thead>
                        <tbody> 
                          @for ($i = 0; $i < $trabajadores->count(); $i++)
                            <tr>
                              <td>{{$trabajadores[$i]->id}}</td>
                              <td>{{$trabajadores[$i]->nombre}}</td>
                              <td>{{$trabajadores[$i]->apellidos}}</td>
                              <td>{{$trabajadores[$i]->dni}}</td>
                              <td><div class="input-group-prepend">
                                <button class="btn btn-warning dropdown-toggle" aria-expanded="false" type="button" data-toggle="dropdown">
                                  Acciones
                                </button>
                                <ul class="dropdown-menu" style="left: 0px; top: 0px; position: absolute; transform: translate3d(0px, 48px, 0px);" x-placement="bottom-start">
                                                          
                                  <li class="dropdown-item">
                                      <a href="#" type="submit">Ver</a>
                                  </li>
                                  
                                  <li  class="dropdown-item"  data-toggle="modal" data-target="#modal-" >           
                                    <a  href="#"   data-descripcion="" >Editar</a>      
                                  </li>
                              
                                  <li class="dropdown-divider" ></li>
                              
                                  <li  class="dropdown-item"  data-toggle="modal" data-target="#modal-bajaTrabajador" onclick="bajaTrabajador({{$empresa->id}},'{{$contratos[$i]}}','{{$trabajadores[$i]->nombre}}','{{$trabajadores[$i]->apellidos}}')">           
                                    <a  href="#">Baja trabajador</a>
                                  </li>
                              
                                </ul>  
                              </div></td>
                            </tr> 
                              
                          @endfor                 
                          {{-- {{$trabajadores}},{{$contratos}}, --}}
                          
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

  });// fin de  $(document).ready(function()

  function altaTrabajador(empresaID) {
    $("#empresa_id").val(empresaID);
  }

  function bajaTrabajador(empresaID,contratoID,nombre,apellidos) {
    console.log('baja: '+nombre)

    var url = '{{ route("contrato.bajaTrabajador", ":id") }}';
        url = url.replace(':id', contratoID);
       
        $("#bajaTrabajadorForm").attr('action', url);   

        $("#cuertpoTextoBAJA").text(nombre);
        $("#cuerpoDescripcionBAJA").text(apellidos);                               

    
  }

</script>

@endsection
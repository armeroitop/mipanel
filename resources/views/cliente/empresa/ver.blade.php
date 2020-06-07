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
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listado de empresas</h3>
                <button type="button" class="btn btn-success float-sm-right" data-toggle="modal" data-target="#modal-nuevaEmpresa">
                    nueva Empresa
                </button>                
            </div>            
            <!-- /.card-header -->
            <div class="card-body">
            <table id="tablaIndexObra" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Cif</th>
                        <th>Dirección</th>
                        <th>Localidad</th>  
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

  {{$empresas}}


@endsection

@section('script')
    
    
@endsection
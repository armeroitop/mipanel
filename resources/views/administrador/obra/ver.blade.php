@extends('admin_panel.admin')

@section('styles')
<style>
  
  </style>
    
@endsection

@section('sidebar_menu')
    @include('administrador.partials.panel_iz')
@endsection

@section('modals')
    @include('administrador.obra.partials.mod_Ver_Obra')
    @include('modals.cargo')
@endsection

@section('content')

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-sm-6">
          <h1>Resumen de obra</h1>
        </div>

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('paneladmin/obra')}}">Obra</a></li>
            <li class="breadcrumb-item active">{{$obra->nombre}}</li>
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
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa-chart-bar"></i>Datos principales</h3>

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
                <div class="col-6">
                  <dl class="row">
                    <dt class="col-sm-4">Nombre</dt><dd class="col-sm-8">{{$obra->nombre}}</dd>                  
                    <dt class="col-sm-4">Descripción</dt><dd class="col-sm-8">{{$obra->descripcion}}</dd>
                    <dt class="col-sm-4">Dirección</dt><dd class="col-sm-8">{{$obra->direccion}}</dd>                  
                    <dt class="col-sm-4">Localidad</dt> <dd class="col-sm-8"> @isset($localidad){{ $localidad->nombre }}@endisset</dd>
                    <dt class="col-sm-4">Provincia</dt> <dd class="col-sm-8"> @isset($localidad->provincia->nombre){{ $localidad->provincia->nombre }}@endisset</dd>
                    {{-- {{$obra}} <br>
                    {{$promotor}}<br> --}}
                  </dl>                
                </div>
                <div class="col-6">
                  <dl class="row">
                    <dt class="col-sm-4">Código cliente</dt><dd class="col-sm-8">{{$obra->nombre}}</dd>                  
                    <dt class="col-sm-4">Código empresa</dt><dd class="col-sm-8">{{$obra->descripcion}}</dd>
                    
                  </dl>                
                </div>
              </div><!-- /.row -->              

              <div class="row">                
              
              </div><!-- /.row -->
              
            </div><!-- /.card-body -->            
          </div><!-- /.card -->          
        </div><!-- /.col -->        
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
      
    <div class="container-fluid">
      <!-- row -->
      <div class="row">
        <div class="col-12">
          <!-- jQuery Knob -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fa fa-chart-bar"></i>
                Participantes 
              </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-success float-sm-right" data-toggle="modal" data-target="#modal-nuevoParticipante">Añadir participante</button>    
                <button class="btn btn-tool" type="button" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                <button class="btn btn-tool" type="button" data-card-widget="remove"><i class="fas fa-times"></i></button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <div class="row">    
                <div class="col-6">
                  <dl class="row">            
                    <dt class="col-sm-4">Promotor</dt> <dd class="col-sm-8"> @isset($promotor){{ $promotor->contratante->nombre }}@endisset</dd>
                    @foreach ($participantes as $participante)
                        <dt class="col-sm-4">{{$participante->cargo->nombre}}</dt><dd class="col-sm-8"> {{$participante->persona->nombre}}  {{$participante->persona->apellidos}}</dd>
                    @endforeach
                    
                  </dl>
                </div>
              </div><!-- /.row -->              

              <div class="row">                
              
              </div><!-- /.row -->
              
            </div><!-- /.card-body -->            
          </div><!-- /.card -->          
        </div><!-- /.col -->        
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->

    <div class="container-fluid">
      <!-- row -->
      <div class="row">
        <div class="col-12">
          <!-- jQuery Knob -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa-chart-bar"></i>      
                Estado</h3>

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
                
              </div><!-- /.row -->              

              <div class="row">                
              
              </div><!-- /.row -->
              
            </div><!-- /.card-body -->            
          </div><!-- /.card -->          
        </div><!-- /.col -->        
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->

    <div class="container-fluid">
      <!-- row -->
      <div class="row">
        <div class="col-12">
          <!-- jQuery Knob -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fa fa-chart-bar"></i>
                Arbol de subcontrataciones 
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
                <ul class="col-12" id="arbolsubcontratacion">
                  {{-- AQUI SE INSERTA EL ARBOL DE SUBCONTRATACIONES DE FORMA DINAMICA --}}
                </ul>                  
              </div><!-- /.row -->

              @if ($promotor)  
                
              @endif

             {{--  {{$subcontrataciones}} --}}

            </div><!-- /.card-body -->            
          </div><!-- /.card -->          
        </div><!-- /.col -->        
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->

  </section>
  



@endsection



@section('script')  
<script>
  
  $(document).ready(function() {
    //Initialize Select2 Elements
    $('#selec2Subcontratista').select2({
        theme: 'bootstrap4',
        placeholder: "Selecciona una empresa",
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

    generarArbolSubcontratacion();
   
  })//Fin document ready

  function generarArbolSubcontratacion(){
    var subcontrataciones = {!! $subcontrataciones !!} ;
    //console.log(subcontrataciones);
    
    //Este código crea el arbol de subcontrataciones
    subcontrataciones.forEach(element => {    

      //Este codigo crea el ID de la raiz desde donde vamos a colgar el hijo
      var raiz;
      if (element.contratante_id == element.contratado_id) {
        raiz = '#arbolsubcontratacion';        
      } else {       
        
        subcontrataciones.forEach(e => {
         /*  if (element.contratante_id == e.contratado_id) {
            raiz = '#subcont'+e.id+'';
          } */
          if (element.orden == e.id) {
            raiz = '#subcont'+e.id+'';
          }
        });                
      }

      var boton = '<div class="btn-group ">\
                    <button class="btn btn-default dropdown-toggle dropdown-icon btn-sm" type="button" data-toggle="dropdown">\
                      <i class="fa fa-cog"></i><span class="sr-only">Toggle Dropdown</span></button>\
                      <div class="dropdown-menu" role="menu">\
                        <a class="dropdown-item" type="button" data-toggle="modal" data-target="#modal-nuevaSubcontratacion" onclick="subcontratar('+element.contratado_id+','+element.nivel+','+element.obra_id+','+element.id+')">Subcontratar</a>\
                        <a class="dropdown-item" href="#">Another action</a>\
                        <a class="dropdown-item" href="#">Something else here</a>\
                        <div class="dropdown-divider"></div>\
                        <a class="dropdown-item" href="#">Separated link</a>\
                      </div>\
                  </div>';

                 /*  onclick="subcontratar('+element.contratante_id+','+element.nivel+','+element.obra_id+')" */

      //Si es el primer hijo le agregamos el encabezado de lista ul
      if($(raiz).children('ul').length > 0){
        console.log(raiz+' segundo hijo '+element.contratado.nombre+' de '+element.contratante_id)
        
        $(raiz).children('ul').append(          
          '<li id="subcont'+element.id+'">' + element.contratado.nombre +'&nbsp;'+ boton + '</li>'
        );

      }else{
        console.log(raiz+' primer hijo '+element.contratado.nombre+' de '+element.contratante_id)
        $(raiz).append(
          '<ul><li id="subcont'+element.id+'">'+element.contratado.nombre +'&nbsp;'+ boton +'</li></ul>'          
        );
      }
     /* $(raiz).append(          
        '<div class="col-11" id="subcont'+element.id+'">'+element.contratado.nombre+'</div>'        
      ); */ 
           
    });//fin del bucle

    
  }


  function subcontratar(contratado_id,nivel,obra_id,orden)   {
    console.log('el id del contratante es: ' +contratado_id +' '+nivel+ ' ' +obra_id) ;

    
    $("#contratante_id").val(contratado_id);//en nuevo contratante es el viejo contratado
    $("#nivel").val(nivel);
    $("#orden").val(orden);
    $("#obra_id").val(obra_id);
  }
  

  $('#selec2Persona').select2({
        theme: 'bootstrap4',            
        placeholder: "Busca una persona",
        allowClear: true,
        minimumInputLength: 2, 
        ajax:{
            url:"/api/persona/create",
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
    });//Fin Selec2 selec2Persona

    $('#selec2Cargo').select2({
        theme: 'bootstrap4',            
        placeholder: "Busca un cargo",
        allowClear: true,
        minimumInputLength: 0, 
        ajax:{
            url:"/api/cargo/create",
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
    });//Fin Selec2 selec2Cargo


</script>
@endsection
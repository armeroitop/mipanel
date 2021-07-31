@extends('admin_panel.admin')

@section('styles')
<style>
  
  </style>
    
@endsection

@section('sidebar_menu')
    @include('panel.partials.panel_iz')
@endsection

@section('modals')
    @include('panel.obra.partials.mod_Ver_Obra')
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
            <li class="breadcrumb-item"><a href="{{route('obra.css')}}">Obra</a></li>
            <li class="breadcrumb-item active">{{$obra->nombre}}</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  
  <section class="content">

    {{-- DATOS PRINCIPALES --}}
    <div class="container-fluid">
      <!-- row -->
      <div class="row">
        <div class="col-12">
          <!-- jQuery Knob -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa-chart-bar"></i> DatOs principales</h3>

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
                <div class="col-md-6">
                  <dl class="row">
                    <dt class="col-4">Nombre</dt><dd class="col-8">{{$obra->nombre}}</dd>                  
                    <dt class="col-4">Descripción</dt><dd class="col-8">{{$obra->descripcion}}</dd>
                    <dt class="col-4">Dirección</dt><dd class="col-8">{{$obra->direccion}}</dd>                  
                    <dt class="col-4">Localidad</dt> <dd class="col-8"> @isset($localidad){{ $localidad->nombre }}@endisset</dd>
                    <dt class="col-4">Provincia</dt> <dd class="col-8"> @isset($localidad->provincia->nombre){{ $localidad->provincia->nombre }}@endisset</dd>
                    {{-- {{$obra}} <br>
                    {{$promotor}}<br> --}}
                  </dl>                
                </div>
                <div class="col-md-6">
                  <dl class="row">
                    <dt class="col-4">Código cliente</dt><dd class="col-8">{{$obra->nombre}}</dd>                  
                    <dt class="col-4">Código empresa</dt><dd class="col-8">{{$obra->descripcion}}</dd>
                    
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
      
    {{-- PARTICIPANTES --}}
    <div class="container-fluid">
      <!-- row -->
      <div class="row">
        <div class="col-12">
          <!-- jQuery Knob -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa-chart-bar"></i> Participantes</h3>

              <div class="card-tools">                    
                <button class="btn btn-tool" type="button" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                <button class="btn btn-tool" type="button" data-card-widget="remove"><i class="fas fa-times"></i></button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
                <div class="row">    
                    <div class="col-md-6">
                        <dl class="row">            
                            <dt class="col-md-4">Promotor</dt> <dd class="col-8"> @isset($promotor){{ $promotor->contratante->nombre }}@endisset</dd>
                            @foreach ($participantes as $participante)
                            <dt class="col-md-4">{{$participante->cargo->nombre}}</dt><dd class="col-8"> {{$participante->persona->nombre}}  {{$participante->persona->apellidos}}</dd>
                            @endforeach
                            <dt class="col-4"> </dt><dd class="col-sm-8"><button type="button" class="btn btn-success " data-toggle="modal" data-target="#modal-nuevoParticipante">Añadir participante</button> </dd>
                            
                        </dl>
                    </div>
                </div><!-- /.row -->  
            </div><!-- /.card-body -->            
        </div><!-- /.card -->          
    </div><!-- /.col -->        
</div><!-- /.row -->
</div><!-- /.container-fluid -->

{{-- ARBOL DE SUBCONTRATACION --}}
<div class="container-fluid">
  <!-- row -->
  <div class="row">
    <div class="col-12">
      <!-- jQuery Knob -->
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fa fa-sitemap"></i> Arbol de subcontrataciones </h3>

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

{{-- DOCUMENTOS E ITOS --}}
    <div class="container-fluid">
      <!-- row -->
      <div class="row">
        <div class="col-12">
          <!-- jQuery Knob -->
          <div class="card collapsed-card">
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa-chart-bar"></i> Documentos e itos</h3>

              <div class="card-tools">
                <button class="btn btn-tool" type="button" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
                <button class="btn btn-tool" type="button" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <div class="row">
                <div class="col-md-12">
                  <!-- The time line -->
                  <div class="timeline">
                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-red">10 Feb. 2014</span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-envelope bg-blue"></i>
                      <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
      
                        <div class="timeline-body">
                          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                          weebly ning heekya handango imeem plugg dopplr jibjab, movity
                          jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                          quora plaxo ideeli hulu weebly balihoo...
                        </div>
                        <div class="timeline-footer">
                          <a class="btn btn-primary btn-sm">Read more</a>
                          <a class="btn btn-danger btn-sm">Delete</a>
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-user bg-green"></i>
                      <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                        <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-comments bg-yellow"></i>
                      <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>
                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                        <div class="timeline-body">
                          Take me to your leader!
                          Switzerland is small and neutral!
                          We are more like Germany, ambitious and misunderstood!
                        </div>
                        <div class="timeline-footer">
                          <a class="btn btn-warning btn-sm">View comment</a>
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-green">3 Jan. 2014</span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                      <i class="fa fa-camera bg-purple"></i>
                      <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 2 days ago</span>
                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                        <div class="timeline-body">
                          <img alt="..." src="http://placehold.it/150x100">
                          <img alt="..." src="http://placehold.it/150x100">
                          <img alt="..." src="http://placehold.it/150x100">
                          <img alt="..." src="http://placehold.it/150x100">
                          <img alt="..." src="http://placehold.it/150x100">
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-video bg-maroon"></i>
      
                      <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 5 days ago</span>
      
                        <h3 class="timeline-header"><a href="#">Mr. Doe</a> shared a video</h3>
      
                        <div class="timeline-body">
                          <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs" frameborder="0" allowfullscreen=""></iframe>
                          </div>
                        </div>
                        <div class="timeline-footer">
                          <a class="btn btn-sm bg-maroon" href="#">See comments</a>
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <div>
                      <i class="fas fa-clock bg-gray"></i>
                    </div>
                  </div>
                </div>
                <!-- /.col -->
              </div>             

              <div class="row">                
              
              </div><!-- /.row -->
              
            </div><!-- /.card-body -->            
          </div><!-- /.card -->          
        </div><!-- /.col -->        
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->

    {{-- ESTADO --}}
    <div class="container-fluid">
      <!-- row -->
      <div class="row">
        <div class="col-12">
          <!-- jQuery Knob -->
          <div class="card collapsed-card">
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa-chart-bar"></i>      
                Estado</h3>

              <div class="card-tools">
                <button class="btn btn-tool" type="button" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
                <button class="btn btn-tool" type="button" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <div class="row">  
                <div class="card-body">
                  <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div></div></div><div class="chartjs-size-monitor-shrink"><div></div></div></div>
                    <canvas width="764" height="250" class="chartjs-render-monitor" id="areaChart" style="width: 764px; height: 250px; display: block; min-height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>              
                
              </div><!-- /.row -->              

              <div class="row">                
              
              </div><!-- /.row -->
              
            </div><!-- /.card-body -->            
          </div><!-- /.card -->          
        </div><!-- /.col -->        
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->

    {{-- SEGUIMIENTO --}}
    <div class="container-fluid">
      <!-- row -->
      <div class="row">
        <div class="col-12">
          <!-- jQuery Knob -->
          <div class="card collapsed-card">
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa-chart-bar"></i> Seguimiento</h3>
              
              <div class="card-tools">
                <button class="btn btn-tool" type="button" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
                <button class="btn btn-tool" type="button" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
              </div>
            </div><!-- /.card-header -->
            
            <div class="card-body">

              <div class="row">      
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fa fa-eye"></i></span>
      
                    <div class="info-box-content">
                      <div class="row">
                          <div class="col-6">
                          <span class="info-box-text">Visitas totales</span>
                          <span class="info-box-number">50</span>
                        </div>
                        <div class="col-6">
                          <span class="info-box-text">Visitas mes</span>
                          <span class="info-box-number">5</span>
                        </div>
                      </div>                      
                    </div><!-- /.info-box-content -->                    
                  </div><!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fa fa-users"></i></span>
      
                    <div class="info-box-content">
                      <div class="row">
                          <div class="col-6">
                          <span class="info-box-text">Reuniones totales</span>
                          <span class="info-box-number">50</span>
                        </div>
                        <div class="col-6">
                          <span class="info-box-text">Reuniones mes</span>
                          <span class="info-box-number">5</span>
                        </div>
                      </div>                      
                    </div><!-- /.info-box-content -->                    
                  </div><!-- /.info-box -->
                </div>
                
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="fa fa-bible"></i></span>
      
                    <div class="info-box-content">
                      <div class="row">
                          <div class="col-6">
                          <span class="info-box-text">Anotaciones totales</span>
                          <span class="info-box-number">50</span>
                        </div>
                        <div class="col-6">
                          <span class="info-box-text">Anotaciones mes</span>
                          <span class="info-box-number">5</span>
                        </div>
                      </div>                      
                    </div><!-- /.info-box-content -->                    
                  </div><!-- /.info-box -->
                </div>

              </div><!-- /.row -->              

              <div class="row">                
              
              </div><!-- /.row -->
              
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

    generarChart();
   
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



    
    //--------------
    //- AREA CHART -
    //--------------
    
    function generarChart() {
      // Get context with jQuery - using jQuery's .get() method.
      var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

      var areaChartData = {
        labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
          {
            label               : 'Avance real',
            backgroundColor     : 'rgba(60,141,188,0.9)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : true,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : [28, 48, 40, 19, 86, 27, 90]
          },
          {
            label               : 'Avance teórico',
            backgroundColor     : 'rgba(210, 214, 222, 1)',
            borderColor         : 'rgba(210, 214, 222, 1)',
            pointRadius         : true,
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : [0, 4, 25, 35, 75,90, 100]
          },
        ]
      }

      var areaChartOptions = {
        maintainAspectRatio : false,
        responsive : true,
        legend: {
          display: true
        },
        scales: {
          xAxes: [{
            gridLines : {
              display : false,
            }
          }],
          yAxes: [{
            gridLines : {
              display : true,
            }
          }]
        }
      }

      // This will get the first returned node in the jQuery collection.
      var areaChart       = new Chart(areaChartCanvas, { 
        type: 'line',
        data: areaChartData, 
        options: areaChartOptions
      })    
    }

</script>
@endsection
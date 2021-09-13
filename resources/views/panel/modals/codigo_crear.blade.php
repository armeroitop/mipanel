{{-- MODAL CREAR CODIGO DE OBRA PARA PROMOTOR --}}
<div class="modal fade" id="modal-crearCodigoObraPromotor">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Crea y asigna un código de obra</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        <form action="{{route('codigo.store')}}" method="POST" id="creaCodigoObraPromotor">
          @csrf 
          <div class="modal-body">
            
            <div class="form-group">
                <label>Código</label>
                <input class="form-control " type="text" placeholder="Escribe el código de la obra" style="width: 100%;" id="" name="codigo"></input>                                  
            </div><!-- /.form-group -->
           
            <div>              
                <input  id="obra_id" type="hidden"  name="obra_id" value="{{$obra->id}}">   
                @if ($promotor)
                  <input  id="empresa_id" type="hidden"  name="empresa_id" value="{{$promotor->contratante_id}}">
                @endif          
            </div>  
            
          </div>   <!-- /modal-body -->       
        
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default btn-outline-secondary" data-dismiss="modal">Cerrar</button>            
            <button type="submit" data-target="trigger" class="btn btn-primary">Guardar</button>
          </div>
        </form>
  
      </div><!-- /.modal-content -->      
    </div> <!-- /.modal-dialog -->   
</div>{{--fin MODAL CREAR CODIGO DE OBRA PARA EMPRESA --}}

{{-- MODAL CREAR CODIGO DE OBRA PARA EMPRESA --}}
<div class="modal fade" id="modal-crearCodigoObraEmpresa">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Crea y asigna un código de obra</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        <form action="{{route('codigo.store')}}" method="POST" id="creaCodigoObraEmpresa">
          @csrf 
          <div class="modal-body">
            
            <div class="form-group">
                <label>Código</label>
                <input class="form-control " type="text" placeholder="Escribe el código de la obra" style="width: 100%;" id="" name="codigo"></input>                                  
            </div><!-- /.form-group -->

            <div class="form-group">
                <label>Empresa</label>
                <select class="form-control select2" style="width: 100%;" id="selec2Empresa" name="empresa_id" ></select>                                  
            </div><!-- /.form-group -->

            {{-- <div class="form-group">
                <label>Cargo</label>
                <select class="form-control select2" style="width: 100%;" id="selec2CargoC" name="cargo_id" ></select>                                  
            </div><!-- /.form-group --> --}}

            <div>              
                <input  id="obra_id" type="hidden"  name="obra_id" value="{{$obra->id}}">             
            </div>  
           
          </div>   <!-- /modal-body -->       
        
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" data-target="trigger" class="btn btn-primary" >Guardar</button>
          </div>
        </form>
  
      </div><!-- /.modal-content -->      
    </div> <!-- /.modal-dialog -->   
</div>{{--fin MODAL CREAR CODIGO DE OBRA PARA EMPRESA --}}

@section('script') 
    @parent
    <script>
    //EN ESTA PARTE SE INSERTA MI SCRIPT DE MI MODAL CODIGO
    $('#selec2Empresa').select2({
        theme: 'bootstrap4',            
        placeholder: "Selecciona tu empresa",
        allowClear: true,
        minimumInputLength: 0, 
        ajax:{
            url:"/api/codigo/create",
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
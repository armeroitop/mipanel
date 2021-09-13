{{-- MODAL CREA SUBCONTRATACION --}}
<div class="modal fade" id="modal-nuevaSubcontratacion">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Crear una subcontratacion</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        <form action="{{route('subcontratacion.store')}}" method="POST" id="creaSubcontratacionForm">
          @csrf 
          <div class="modal-body">
            
            <div class="form-group">
              <label>Subcontratar a</label>
              <select class="form-control select2" style="width: 100%;" id="selec2Subcontratista" name="contratado_id" ></select>                                  
            </div><!-- /.form-group -->
            
            <div class="form-group">
              <label for="nombre">Representante de la parte contratante</label>
              <input class="form-control" id="representante_contratante" type="text" placeholder="Nombre de la obra" name="representante_contratante">
            </div>

            <div class="form-group">
              <label for="nombre">Representante de la parte contratada</label>
              <input class="form-control" id="representante_contratado" type="text" placeholder="Nombre de la obra" name="representante_contratado">
            </div>  

            <div >              
              <input  id="obra_id" type="hidden"  name="obra_id">
              <input  id="nivel"   type="hidden"  name="nivel">
              <input  id="orden"   type="hidden"  name="orden">
              <input  id="contratante_id"   type="hidden"  name="contratante_id">
            </div>  
           
            fecha inicial y final

  
          </div>   <!-- /modal-body -->       
        
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" data-target="trigger" class="btn btn-primary" >Guardar</button>
          </div>
        </form>
  
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>{{--fin MODAL CREA OBRA --}}


@section('script') 
  @parent
    <script>
        //Initialize Select2 Elements. Se cargan las empresas en "Subcontratar a"
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

    </script>
@endsection
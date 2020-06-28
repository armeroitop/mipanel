{{-- MODAL ASIGNAR PARTICIPANTE Y CARGO --}}
<div class="modal fade" id="modal-nuevoParticipante">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Nuevo participante</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        <form action="{{route('cargo.asignaCargoParticipante')}}" method="POST" id="asignaCargoParticipanteForm">
          @csrf 
          <div class="modal-body">
            
            <div class="form-group">
              <label>Persona</label>
              <select class="form-control select2" style="width: 100%;" id="selec2Persona" name="persona_id" ></select>                                  
            </div><!-- /.form-group -->

            <div class="form-group">
              <label>Cargo</label>
              <select class="form-control select2" style="width: 100%;" id="selec2Cargo" name="cargo_id" ></select>                                  
            </div><!-- /.form-group -->

            <div >              
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
   
</div>{{--fin MODAL ASIGNAR PARTICIPANTE Y CARGO --}}



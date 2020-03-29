
{{-- MODAL ELIMINACION DE OBRAS --}}
<div class="modal fade" id="modal-eliminaObra">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">¡Atención! vas a eliminar la obra:</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" id="cuertpoTexto"> </div>
      <p class="modal-body" id="cuerpoDescripcion"></p>

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>

          <form action="" method="POST" id="deleteForm" >        
            @method('delete')
            @csrf  
            <button    class="btn btn-outline-light" id="boton_eliminar"  data-target="trigger" type="submit" onclick="formSubmit()" >Eliminar</button>
          </form>
      </div>        
    </div><!-- /.modal-content -->      
  </div><!-- /.modal-dialog -->    
</div>{{--fin MODAL ELIMINACION DE OBRAS --}}
  
{{-- MODAL CREA OBRA --}}
<div class="modal fade" id="modal-nuevaObra">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Crear una obra nueva</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('obra.store')}}" method="POST" id="creaObraForm">
        @csrf 
        <div class="modal-body">
          <!-- /.form-group -->
          <div class="form-group">
            <label>Promotor</label>
            <select class="form-control select2" style="width: 100%;" id="selec2Promotor" name="promotor"></select>                                  
          </div><!-- /.form-group -->
          
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input class="form-control" id="nombre" type="text" placeholder="Nombre de la obra" name="obra">
          </div>

          <div class="form-group">
            <label>Descripción</label>
            <textarea class="form-control" id="descripcion" placeholder="Descripción breve de la obra ..." rows="3" name="descripcion"></textarea>
          </div>

          <div class="form-group">
            <label for="direccion">Dirección</label>
            <input class="form-control" id="direccion" type="text" placeholder="Calle" name="direccion">
          </div>

          <div class="form-group">
            <label>Localidad</label>
            <select class="form-control select2" style="width: 100%;" id="selec2Localidad" name="localidad"></select>                                  
          </div>

          <div class="form-group">
            <div class="row">
            <div class="col-md-6">
              <label for="inicio_previsto">Fecha de inicio</label>
              <input class="form-control" id="inicio_previsto" type="date" placeholder="ej. Murcia" name="inicio_previsto">
            </div>
            <div class="col-md-6">
              <label for="fin_previsto">Fecha de finalización</label>
              <input class="form-control" id="fin_previsto" type="date" placeholder="ej. Murcia" name="fin_previsto">
            </div></div>
          </div>

          <div class="form-group clearfix">
            <div class="icheck-primary ">
              <input name="r1" id="radioPrimary1" type="radio" checked="" name="con_proyecto">
              <label for="radioPrimary1">Con proyecto</label>
            </div>
            <div class="icheck-primary">
              <input name="r1" id="radioPrimary2" type="radio" name="sin_proyecto">
              <label for="radioPrimary2">Sin proyecto</label>
            </div>            
          </div>  

         
        </div>          
      
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" data-target="trigger" class="btn btn-primary" >Guardar</button>
        </div>
      </form>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>{{--fin MODAL CREA OBRA --}}
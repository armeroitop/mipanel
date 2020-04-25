{{-- MODAL CREA EMPRESA --}}
<div class="modal fade" id="modal-nuevaEmpresa">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Crear una empresa nueva</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        <form action="{{route('empresa.store')}}" method="POST" id="creaEmpresaForm">
          @csrf 
          <div class="modal-body">
                        
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input class="form-control" id="nombre" type="text" placeholder="Nombre de la empresa" name="nombre">
            </div>
  
            <div class="form-group">
                <label for="cif">Cif</label>
                <input class="form-control" id="cif" type="text" placeholder="Cif" name="cif">
              </div>
  
            <div class="form-group">
              <label for="direccion">Dirección</label>
              <input class="form-control" id="direccion" type="text" placeholder="Calle" name="direccion">
            </div>
  
            <div class="form-group">
              <label>Localidad</label>
              <select class="form-control select2" style="width: 100%;" id="selec2Localidad" name="localidad_id"></select>                                  
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
  </div>{{--fin MODAL CREA EMPRESA --}}

{{-- MODAL EDIT EMPRESA --}}
<div class="modal fade" id="modal-editEmpresa">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edita una empresa</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        <form action="" method="POST" id="updateEmpresaForm">
          @method('put')
          @csrf 
          <div class="modal-body">
                        
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input class="form-control" id="nombreEmpresa" type="text" placeholder="Nombre de la empresa" name="nombre">
            </div>
  
            <div class="form-group">
                <label for="cif">Cif</label>
                <input class="form-control" id="cifEmpresa" type="text" placeholder="Cif" name="cif">
              </div>
  
            <div class="form-group">
              <label for="direccion">Dirección</label>
              <input class="form-control" id="direccionEmpresa" type="text" placeholder="Calle" name="direccion">
            </div>
  
            <div class="form-group">
              <label>Localidad</label>
              <select class="form-control select2" style="width: 100%;" id="selec2EditLocalidad" name="localidad_id">
                
              </select>                                  
            </div>
           
          </div>          
        
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" data-target="trigger" class="btn btn-primary"onclick="formSubmit()" >Guardar</button>
          </div>
        </form>
  
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>{{--fin MODAL EDIT EMPRESA --}}

{{-- MODAL ELIMINACION DE EMPRESAS --}}
<div class="modal fade" id="modal-eliminaEmpresa">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">¡Atención! vas a eliminar la empresa:</h4>
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
  </div>{{--fin MODAL ELIMINACION DE EMPRESAS --}}
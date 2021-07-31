
{{-- MODAL ELIMINACION DE PERMISOS --}}
  <div class="modal fade" id="modal-eliminaPermiso">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">¡Atención! vas a eliminar la permiso:</h4>
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
    
{{-- MODAL CREA PERMISOS --}}
  <div class="modal fade" id="modal-nuevoPermiso">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Crear un permiso nuevo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        <form action="{{route('permiso.store')}}" method="POST" id="creaPermisoForm">
          @csrf 
          <div class="modal-body">
                        
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input class="form-control" id="nombre" type="text" placeholder="escribe aquí el nombre" name="name">
            </div>  
  
            <div class="form-group">
              <label for="direccion">Slug</label>
              <input class="form-control" id="apellidos" type="text" placeholder="escribe aquí los apellidos" name="slug">
            </div>

            <div class="form-group">
              <label>Descripción</label>
              <textarea class="form-control" id="description" placeholder="Describe que permite hacer este Permiso" rows="3" name="description"></textarea>
            </div>
                               
          </div> {{-- Fin de "modal-body" --}}
                       
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" data-target="trigger">Guardar</button>
          </div>
        </form>  
      </div><!-- /.modal-content -->      
    </div><!-- /.modal-dialog -->    
  </div>
{{--fin MODAL CREA OBRA --}}
  
{{-- MODAL EDITA PERMISOS --}}
  <div class="modal fade" id="modal-editPermiso">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edita el permiso</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        <form action="" method="POST" id="updatePermisoForm">
          @method('put')
          @csrf 
          <div class="modal-body">
                        
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input class="form-control" id="edit_nombre" type="text" placeholder="escribe aquí el nombre" name="name">
              <input class="form-control" id="edit_id" type="hidden"  name="id">
            </div>  
  
            <div class="form-group">
              <label for="direccion">Slug</label>
              <input class="form-control" id="edit_slug" type="text" placeholder="escribe aquí los apellidos" name="slug">
            </div>

            <div class="form-group">
              <label>Descripción</label>
              <textarea class="form-control" id="edit_description" placeholder="Describe que permite hacer este Permiso" rows="3" name="description"></textarea>
            </div>
                                 
          </div> {{-- Fin de "modal-body" --}}          
        
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" data-target="trigger">Guardar</button>
          </div>

        </form>  

      </div><!-- /.modal-content -->      
    </div> <!-- /.modal-dialog -->   
  </div>{{--fin MODAL EDITA OBRA --}}
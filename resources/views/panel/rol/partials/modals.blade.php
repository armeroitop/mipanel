
{{-- MODAL ELIMINACION DE ROLES --}}
  <div class="modal fade" id="modal-eliminaRol">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">¡Atención! vas a eliminar la rol:</h4>
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
    
{{-- MODAL CREA ROLES --}}
  <div class="modal fade" id="modal-nuevoRol">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Crear un rol nuevo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        <form action="{{route('rol.store')}}" method="POST" id="creaRolForm">
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
              <textarea class="form-control" id="description" placeholder="Describe que permite hacer este Rol" rows="3" name="description"></textarea>
            </div>

            <div class="form-group">
              <div class="icheck-primary" id="elemVue">
                <input name="checkbox_acceso0" id="checkbox_acceso0" type="checkbox"  value="acceso" >
                <label for="checkbox_acceso0">Permiso especial</label>
              </div> 
              <div class="icheck-primary d-inline">
                <input name="special" id="acceso1" type="radio"  value="all-access" disabled=''>
                <label for="acceso1">all-access</label>
              </div>
              <div class="icheck-primary d-inline">
                <input name="special" id="acceso2" type="radio"  value="no-access" disabled=''>
                <label for="acceso2">no-access</label>
              </div>            
            </div>
            
            <div class="form-group card">
                <div class="card-header">
                  <h3 class="card-title">Lista de permisos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>Check</th>
                        <th>Nombre</th>
                        <th>Slug</th>
                        <th>Descripcion</th>                        
                      </tr>
                    </thead>
                    <tbody id="tablaPermisos">
                      {{-- aqui se inserta de forma dinamica la tabla --}}
                    </tbody>
                  </table>
                </div> <!-- /.card-body -->               
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
  
{{-- MODAL EDITA ROLES --}}
  <div class="modal fade" id="modal-editRol">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edita el rol</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        <form action="" method="POST" id="updateRolForm">
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
              <textarea class="form-control" id="edit_description" placeholder="Describe que permite hacer este Rol" rows="3" name="description"></textarea>
            </div>
            
            <div class="form-group">
              <div class="icheck-primary" id="elemVue">
                <input name="checkbox_acceso0" id="edit_checkbox_acceso0" type="checkbox"  value="acceso" >
                <label for="edit_checkbox_acceso0">Permiso especial</label>
              </div> 
              <div class="icheck-primary d-inline">
                <input name="special" id="edit_acceso1" type="radio"  value="all-access" disabled=''>
                <label for="edit_acceso1">all-access</label>
              </div>
              <div class="icheck-primary d-inline">
                <input name="special" id="edit_acceso2" type="radio"  value="no-access" disabled=''>
                {{-- <input name="special" id="edit_acceso2" type="hidden"  value="null" > --}}
                <label for="edit_acceso2">no-access</label>
              </div>            
            </div>
            
            <div class="form-group card">
                <div class="card-header">
                  <h3 class="card-title">Lista de permisos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>Check</th>
                        <th>Nombre</th>
                        <th>Slug</th>
                        <th>Descripcion</th>                        
                      </tr>
                    </thead>
                    <tbody id="edit_tablaPermisos">
                      {{-- aqui se inserta de forma dinamica la tabla --}}
                    </tbody>
                  </table>
                </div> <!-- /.card-body -->               
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
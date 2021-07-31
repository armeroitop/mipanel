
{{-- MODAL ELIMINACION DE USUARIOS --}}
  <div class="modal fade" id="modal-eliminaUsuario">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">¡Atención! vas a eliminar la usuario:</h4>
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
  </div>{{--fin MODAL ELIMINACION DE USUARIOS --}}
    
{{-- MODAL CREA USUARIOS --}}
  <div class="modal fade" id="modal-nuevoUsuario">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Crear un usuario nuevo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        <form action="{{route('persona.store')}}" method="POST" id="creaUsuarioForm">
          @csrf 
          <div class="modal-body">
                        
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input class="form-control" id="nombre" type="text" placeholder="escribe aquí el nombre" name="nombre">
            </div>  
  
            <div class="form-group">
              <label for="direccion">Apellidos</label>
              <input class="form-control" id="apellidos" type="text" placeholder="escribe aquí los apellidos" name="apellidos">
            </div>

            <div class="form-group">
              <label for="direccion">Dni o Nie</label>
              <input class="form-control" id="dni" type="text" placeholder="escribe aquí el dni" name="dni">
            </div>              
  
            <div class="form-group">              
                <label for="inicio_previsto">Fecha de nacimiento</label>
                <input class="form-control" id="fecha_nacimiento" type="date" name="fecha_nacimiento">   
            </div>           
          </div>          
          
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" data-target="trigger">Guardar</button>
          </div>
        </form>  
      </div><!-- /.modal-content -->      
    </div><!-- /.modal-dialog -->    
  </div>
{{--fin MODAL CREA USUARIO --}}
  
{{-- MODAL EDITA USUARIOS --}}
  <div class="modal fade" id="modal-editUsuario">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edita el usuario</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        <form action="" method="POST" id="updateUsuarioForm">
          @method('put')
          @csrf 
          <div class="modal-body">

            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input class="form-control" id="edit_nombre" type="text" name="nombre">
            </div> 
  
            <div class="form-group">
              <label for="direccion">Email</label>
              <input class="form-control" id="edit_email" type="text" name="email">
            </div>

            <div class="form-group card">
              <div class="card-header">
                <h3 class="card-title">Roles asignados</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Check</th>
                      <th>Nombre</th>                      
                      <th>Descripcion</th>                        
                    </tr>
                  </thead>
                  <tbody id="edit_tablaRoles">
                    {{-- aqui se inserta de forma dinamica la tabla --}}
                  </tbody>
                </table>
              </div> <!-- /.card-body -->               
            </div>      
           
          </div>          
        
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" data-target="trigger">Guardar</button>
          </div>

        </form>  

      </div><!-- /.modal-content -->      
    </div> <!-- /.modal-dialog -->   
  </div>{{--fin MODAL EDITA USUARIO --}}
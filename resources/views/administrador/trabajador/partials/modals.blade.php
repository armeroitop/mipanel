
{{-- MODAL ELIMINACION DE TRABAJADORES --}}
  <div class="modal fade" id="modal-eliminaTrabajador">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">¡Atención! vas a eliminar la trabajador:</h4>
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
    
{{-- MODAL CREA TRABAJADORES --}}
  <div class="modal fade" id="modal-nuevoTrabajador">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Crear un trabajador nuevo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        <form action="{{route('persona.store')}}" method="POST" id="creaTrabajadorForm">
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
{{--fin MODAL CREA OBRA --}}
  
{{-- MODAL EDITA TRABAJADORES --}}
  <div class="modal fade" id="modal-editTrabajador">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edita el trabajador</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        <form action="" method="POST" id="updateTrabajadorForm">
          @method('put')
          @csrf 
          <div class="modal-body">

            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input class="form-control" id="edit_nombre" type="text" name="nombre">
            </div> 
  
            <div class="form-group">
              <label for="direccion">Apellidos</label>
              <input class="form-control" id="edit_apellidos" type="text" name="apellidos">
            </div>
            
            <div class="form-group">
              <label for="direccion">Dni o Nie</label>
              <input class="form-control" id="edit_dni" type="text"  name="dni">
            </div>              
  
            <div class="form-group">              
                <label for="inicio_previsto">Fecha de nacimiento</label>
                <input class="form-control" id="edit_fecha_nacimiento" type="date" name="fecha_nacimiento">   
            </div> 
          </div>          
        
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" data-target="trigger">Guardar</button>
          </div>

        </form>  

      </div><!-- /.modal-content -->      
    </div> <!-- /.modal-dialog -->   
  </div>{{--fin MODAL EDITA OBRA --}}
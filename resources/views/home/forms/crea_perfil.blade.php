<div class="col-md-8">
    <div class="card">
        <div class="card-header">Completa tu perfil</div>
        
        <div class="card-body">

            <form action="{{route('users.asignapersona')}}" method="POST" id="creaTrabajadorForm">
                @csrf 
                <div class="modal-body">
                                
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input class="form-control" id="nombre" type="text" placeholder="escribe aquí el nombre" name="nombre" value="{{Auth::user()->name}}">
                        <input type="hidden"  name="userId" value="{{Auth::user()->id}}">
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
        </div>
    </div>
</div>


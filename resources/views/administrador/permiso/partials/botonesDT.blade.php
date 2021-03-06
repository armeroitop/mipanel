 {{-- Esta pagina carga los botones de acciones en el Datatable de obra.index --}}

 <div class="input-group-prepend">
    <button class="btn btn-warning dropdown-toggle" aria-expanded="false" type="button" data-toggle="dropdown">
      Acciones
    </button>
    <ul class="dropdown-menu" style="left: 0px; top: 0px; position: absolute; transform: translate3d(0px, 48px, 0px);" x-placement="bottom-start">
  
      <li class="dropdown-item">
        <form method="get">
          @csrf
          <a href="{{route('permiso.edit', $id)}}" type="submit">Ver</a>
        </form>
      </li>     
  
      <li class="dropdown-item">
        <li  class="dropdown-item"  data-toggle="modal" data-target="#modal-editPermiso" onclick="editPermiso({{$id}},
                                                                                                        '{{$name}}',
                                                                                                        '{{$slug}}',
                                                                                                        '{{$description}}')">           
          <a  href="#"   data-descripcion="" >Editar</a>
        </li>
      </li>
  
      <li class="dropdown-divider" ></li>
  
      <li  class="dropdown-item"  data-toggle="modal" data-target="#modal-eliminaPermiso" onclick="eliminaPermiso({{$id}},'{{$name}}')">           
        <a  href="#" >Eliminar</a>
      </li>
  
    </ul>
  </div>
  
  
  
  
  
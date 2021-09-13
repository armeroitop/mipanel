 {{-- Esta pagina carga los botones de acciones en el Datatable de obra.index --}}

<div class="input-group-prepend">
  <button class="btn btn-warning dropdown-toggle" aria-expanded="false" type="button" data-toggle="dropdown">
    Acciones
  </button>
  <ul class="dropdown-menu" style="left: 0px; top: 0px; position: absolute; transform: translate3d(0px, 48px, 0px);" x-placement="bottom-start">

    
    <form method="get">
        @csrf
        <a class="dropdown-item" href="{{route('obra.ver', $obra->id)}}" type="submit">Ver</a>
    </form>


               
    <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-editObra" onclick="editObra({{$obra->id}},
                                                                                                            {{json_encode($obra->nombre)}},
                                                                                                            {{json_encode($obra->descripcion)}},
                                                                                                            {{json_encode($obra->direccion)}},
                                                                                                            {{$obra->proyecto}},
                                                                                                            {{$obra->localidad_id}},
                                                                                                            '{{$obra->inicio_previsto}}',
                                                                                                            '{{$obra->fin_previsto}}')" >
        Editar</a>      
    

    <li class="dropdown-divider" ></li>

               
    <a href="#"  class="dropdown-item" data-toggle="modal" data-target="#modal-eliminaObra" onclick="eliminaObra({{$obra->id}},'{{$obra->nombre}}','{{$obra->descripcion}}')">
        Eliminar</a>
   

    {{-- {{$obra}} --}}
  </ul>
</div>





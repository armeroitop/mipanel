{{-- MODAL ELIMINACION DE SUBCONTRATACION --}}
<div class="modal fade" id="modal-eliminaSubcontratacion">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">¡Atención! vas a eliminar la subcontratacion:</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        <div class="modal-body" id="cuerpoTextoModalDeleteSubcontratacion"> </div>
        <p class="modal-body" id="cuerpoDescripcionModalDeleteSubcontratacion"></p>
  
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
  
            <form action="" method="POST" id="deleteSubcontratacionForm" >        
              @method('delete')
              @csrf  
              <button    class="btn btn-outline-light" id="boton_eliminar"  data-target="trigger" type="submit" name="subcontratacion_id" onclick="formSubmit()" >Eliminar</button>
            </form>
        </div>        
      </div><!-- /.modal-content -->      
    </div><!-- /.modal-dialog -->    
  </div>{{--fin MODAL ELIMINACION DE SUBCONTRATACION --}}


@section('script') 
  @parent
    <script>
    //Carga los datos en el Modal para eliminar una subcontratación    
    function eliminaSubcontratacion(id, nombre){
        console.log('elimina una subcontratacion'+id)
        var id = id;
        var nombre = nombre;       
        var url = '{{ route("subcontratacion.destroy", ":id") }}';
        url = url.replace(':id', id);
        
        $("#deleteSubcontratacionForm").attr('action', url);   

        $("#cuerpoTextoModalDeleteSubcontratacion").text(nombre);
        //$("#cuerpoDescripcionModalDeleteSubcontratacion").text(descripcion);                                

    }

    </script>
@endsection
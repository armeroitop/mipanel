@extends('layouts.app')

@section('content')
<div  class="container">  

    <div class="row justify-content-center">
      
      @if (!Auth::user()->persona)
        {{-- Si el  usurario no ha rellenado su perfil, le pasamos un formulario --}}
        @include('home.forms.crea_perfil')

      @elseif(empty(Auth::user()->roles->all()))
        {{-- Mientras el administrador no le asigna un Rol no podrá ver ningun boton de entrada --}}
        
        @include('home.partials.chat')

      @else  
        {{-- Ya tiene un rol y puede acceder a los botones de entrada--}}
        @include('home.botones_principales')

      @endif     
      
    </div>    
</div>

@endsection

@section('script')
  <script>
   
  </script>
@endsection

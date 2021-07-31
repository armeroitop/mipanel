<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

      {{-- Obras --}}
      <li class="nav-item has-treeview menu-closed" >
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-people-carry"></i>
          <p>
            Obras
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
            @role('administrador_sistema')
            <li class="nav-item">
                <a href="{{url('paneladmin/obra')}}" class="nav-link">              
                {{-- <a href="{{url('paneladmin/obra')}}" class="nav-link {{ request()->is('paneladmin/obra') ? 'active' : ''}}">  --}}             
                <i class="fas fa-circle nav-icon"></i>
                <p>Obras</p>
                </a>
            </li>
            @endrole
            @can('obracss.index')
            <li class="nav-item">
                <a href="{{route('obra.css')}}" class="nav-link" id="a_Obras_activas">              
                <i class="fas fa-circle nav-icon"></i>
                <p>Obras CSS</p>
                </a>
            </li>
            @endcan
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p>Subcontrataciones</p>
                </a> 
            </li>
        </ul>
      </li>

      {{-- Embresas --}}
      <li class="nav-item has-treeview menu-closed" >
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-industry"></i>
          <p>
            Empresas
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>       
         
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{url('paneladmin/empresa')}}" class="nav-link">
              <i class="fas fa-circle nav-icon "></i>
              <p>Empresa</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('paneladmin/trabajador')}}"  class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Trabajador</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Maquinaria</p>
            </a>
          </li>
        </ul>
      </li>

      {{-- Usuarios --}}
      <li class="nav-item has-treeview menu-closed">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-user-astronaut"></i>
          <p>
            Usuarios
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{url('paneladmin/usuario')}}" class="nav-link active">
              <i class="far fa-circle nav-icon"></i>
              <p>Usuarios</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Inactive Paja</p>
            </a>
          </li>
        </ul>
      </li>

      {{-- Roles --}}
      @role('administrador_sistema')
      <li class="nav-item has-treeview menu-closed">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-project-diagram"></i>
          <p>
            Roles
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{url('paneladmin/rol')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Rol</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('paneladmin/permiso')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Permiso</p>
            </a>
          </li>
        </ul>
      </li>
      @endrole

      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Simple Link
            <span class="right badge badge-danger">New</span>
          </p>
        </a>
      </li>

    </ul>
</nav>
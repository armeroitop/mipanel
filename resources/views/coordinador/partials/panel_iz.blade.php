<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

    

      {{-- Obras CSS--}}
      @can('coordinador_seguridad') 
      <li class="nav-item has-treeview menu-closed" id="li_Obras">
        <a href="#" class="nav-link" id="a_Obras">
          <i class="nav-icon fas fa-people-carry"></i>
          <p>
            Obras CSS
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('obra.css')}}" class="nav-link" id="a_Obras_activas">              
              <i class="fas fa-circle nav-icon"></i>
              <p>Obras activas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Obras inactivas</p>
            </a>
          </li>
        </ul>
      </li>
      @endcan

      {{-- Embresas --}}
      <li class="nav-item has-treeview menu-closed">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-industry"></i>
          <p>
            Seguimiento
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>       
         
        <ul class="nav nav-treeview">

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-eye nav-icon"></i>
              <p>Visitas</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#"  class="nav-link">
              <i class="fa fa-users nav-icon"></i>
              <p>Reuniones</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-file-alt nav-icon"></i>
              <p>Informes mensuales</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-bible nav-icon"></i>
              <p>Libro incidencias</p>
            </a>
          </li>
          
        </ul>
      </li>

      {{-- Embresas --}}
      <li class="nav-item has-treeview menu-closed">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-industry"></i>
          <p>
            Empresa
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>       
         
        <ul class="nav nav-treeview">

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Mis documentos</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('cliente/persona')}}"  class="nav-link">
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
      {{-- <li class="nav-item has-treeview menu-closed">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-user-astronaut"></i>
          <p>
            Usuarios
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link active">
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
      </li> --}}

      {{-- Roles --}}
      {{-- <li class="nav-item has-treeview menu-closed">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-project-diagram"></i>
          <p>
            Roles
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Rol</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Permiso</p>
            </a>
          </li>
        </ul>
      </li> --}}

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

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ route('lecturas.index') }}" class="nav-link active">
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>
                Lecturas
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('suscriptores.index') }}" class="nav-link">
                 <i class="nav-icon fas fa-copy"></i><i class="fas "></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('matriculas.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>Matriculas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('tarifas.index') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tarifas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Pagos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Abonos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Facturas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Credito y Cartera
              </p>
            </a>
          </li>
        </ul>
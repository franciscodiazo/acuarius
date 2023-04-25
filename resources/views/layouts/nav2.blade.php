
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item  menu-open">
          <a href="{{ route('suscriptores.index') }}" class="nav-link{{ Request::is('suscriptores') ? ' active' : '' }}">
              <i class="nav-icon fas fa-copy"></i><i class="fas "></i>
              <p>Usuarios</p>
            </a>
          </li>

            <li class="nav-item">
              <a href="{{ route('matriculas.index') }}" class="nav-link{{ Request::is('matriculas') ? ' active' : '' }}">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>Matriculas</p>
              </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('lecturas.index') }}" class="nav-link{{ Request::is('lecturas') ? ' active' : '' }}">
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>
                Lecturas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('detallelectura.index') }}" class="nav-link{{ Request::is('detallelectura') ? ' active' : '' }} ">
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>
                Detalle lectura
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('detallefactura.index') }}" class="nav-link{{ Request::is('detallefactura') ? ' active' : '' }}">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Detalle Factura
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('detalles.index') }}" class="nav-link{{ Request::is('detalles') ? ' active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Detalles Cuota
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('creditos.index') }}" class="nav-link{{ Request::is('creditos') ? ' active' : '' }}">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                creditos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('tarifas.index') }}" class="nav-link{{ Request::is('tarifas') ? ' active' : '' }}">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Tarifas
              </p>
            </a>
          </li>
        </ul>
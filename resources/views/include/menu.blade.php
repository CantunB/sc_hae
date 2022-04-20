@auth
<div class="collapse navbar-collapse" id="sidenav-collapse-main">
  <!-- Nav items -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('home') }}">
        <i class="ni ni-tv-2 text-primary"></i>
        <span class="nav-link-text">Dashboard</span>
      </a>
    </li>
    @can('users.index')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
          aria-expanded="false">
          <i class="ni ni-planet text-orange"></i>
          <span class="nav-link-text">Administrador</span>
        </a>
        <div class="dropdown-menu">
            <a class="nav-link" href="{{route('usuarios.index')}}">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Usuarios</span>
              </a>
            <a href="{{ route('permisos.index') }}" class="nav-link">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Permisos</span>
            </a>
                <a href="{{ route('roles.index') }}" class="nav-link">
                <i class="ni ni-single-02 text-yellow"></i>
            <span class="nav-link-text">Roles</span>
            </a>
        </div>
      </li>
    @endcan

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
        aria-expanded="false">
        <i class="ni ni-pin-3 text-primary"></i>
        <span class="nav-link-text">Areas</span>
      </a>
      <div class="dropdown-menu">
        <a href="{{route('departamentos.index')}}" class="nav-link">
          <i class="ni ni-single-02 text-yellow"></i>
          <span class="nav-link-text">Departamentos</span>
        </a>
        <a href="{{route('coordinaciones.index')}}" class="nav-link">
          <i class="ni ni-single-02 text-yellow"></i>
          <span class="nav-link-text">Coordinaciones</span>
        </a>
      </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('requisiciones.index') }}"
          target="_blank">
          <i class="ni ni-ui-04"></i>
          <span class="nav-link-text">Requisiciones</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('cotizaciones.index') }}"
          target="_blank">
          <i class="ni ni-ui-04"></i>
          <span class="nav-link-text">Cotizaciones</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
          aria-expanded="false">
          <i class="ni ni-pin-3 text-primary"></i>
          <span class="nav-link-text">Compras</span>
        </a>
        <div class="dropdown-menu">
          <a href="{{route('ordenes.index')}}" class="nav-link">
            <i class="ni ni-single-02 text-yellow"></i>
            <span class="nav-link-text">Ordenes de compras</span>
          </a>
          <a href="{{route('autorizadas.index')}}" class="nav-link">
            <i class="ni ni-single-02 text-yellow"></i>
            <span class="nav-link-text">Ordenes autorizadas</span>
          </a>
          <a href="{{route('facturas.index')}}" class="nav-link">
            <i class="ni ni-single-02 text-yellow"></i>
            <span class="nav-link-text">Facturas de compras</span>
          </a>
        </div>
      </li>


  </ul>
  <!-- Divider -->
  <hr class="my-3">
  <!-- Heading -->
  <h6 class="navbar-heading p-0 text-muted">
    <span class="docs-normal">Documentation</span>
  </h6>
  <!-- Navigation -->
  <ul class="navbar-nav mb-md-3">
    <li class="nav-item">
      <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html"
        target="_blank">
        <i class="ni ni-spaceship"></i>
        <span class="nav-link-text">Getting started</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html"
        target="_blank">
        <i class="ni ni-palette"></i>
        <span class="nav-link-text">Foundation</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html"
        target="_blank">
        <i class="ni ni-ui-04"></i>
        <span class="nav-link-text">Components</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html"
        target="_blank">
        <i class="ni ni-chart-pie-35"></i>
        <span class="nav-link-text">Plugins</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link active active-pro" href="examples/upgrade.html">
        <i class="ni ni-send text-dark"></i>
        <span class="nav-link-text">Upgrade to PRO</span>
      </a>
    </li>
  </ul>
</div>
@endauth

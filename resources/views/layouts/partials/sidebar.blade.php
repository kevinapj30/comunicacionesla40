<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
  <span class="align-middle">Comunicaciones-La40</span>
</a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="/home">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            @if(auth()->user()->rol_id === 1 || auth()->user()->rol_id === 2)

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('tipo-de-equipos.index')}}">
                        <i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Tipo deEquipos</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('usuarios.index')}}">
                        <i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Usuarios</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('equipos.index')}}">
                        <i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Equipos</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('diagnosticos.index')}}">
                        <i class="align-middle" data-feather="activity"></i> <span class="align-middle">Diagnosticos</span>
                    </a>
                </li>

            @endif

        </ul>

       
    </div>
</nav>
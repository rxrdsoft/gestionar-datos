<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="nav-icon icon-speedometer"></i> Dashboard

                </a>
            </li>
            <li class="nav-title">Suscriptores</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('lista-blanca.todos') }}">
                    <i class="nav-icon icon-drop"></i> Todos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('lista-blanca.list') }}">
                    <i class="nav-icon icon-pencil"></i> Listas</a>
            </li>
            <li class="nav-title">Lista Negra</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('lista-negra.todos') }}">
                    <i class="nav-icon icon-drop"></i> Todos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('lista-negra.list') }}">
                    <i class="nav-icon icon-pencil"></i> Listas</a>
            </li>

            <li class="divider"></li>


        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
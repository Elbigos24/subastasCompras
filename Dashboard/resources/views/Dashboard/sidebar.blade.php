<nav id="sidebar">
    <div class="sidebar-header">
        <h4 class="mb-0 fw-bold" style="color: var(--accent-color);">ACME <span class="fw-light text-white">ADMIN</span></h4>
    </div>
    <div class="mt-4">
        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
            <i class="fas fa-th-large"></i> Dashboard
        </a>

        <a href="{{ route('products.index') }}" class="nav-link {{ request()->is('products*') ? 'active' : '' }}">
            <i class="fas fa-box"></i> Productos
        </a>

        <a href="{{ route('subastas.index') }}" class="nav-link {{ request()->is('subastas*') ? 'active' : '' }}">
            <i class="fas fa-gavel"></i> Subastas
        </a>

        <a href="{{ route('pujas.index') }}" class="nav-link {{ request()->is('pujas*') ? 'active' : '' }}">
            <i class="fas fa-hand-paper"></i> Pujas
        </a>

        <a href="{{ route('compras.index') }}" class="nav-link {{ request()->is('compras*') ? 'active' : '' }}">
            <i class="fas fa-shopping-cart"></i> Compras
        </a>

        <hr class="mx-4 opacity-10">

        <a href="/" class="nav-link">
            <i class="fas fa-external-link-alt"></i> Ver Sitio Web
        </a>
        <a href="#" class="nav-link text-danger mt-5">
            <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
        </a>
    </div>
</nav>

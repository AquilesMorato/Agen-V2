<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Agendas - Agen</title>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>
<body class="dashboard-page-body d-flex">

    <input type="checkbox" id="sidebarToggle" class="d-none">
    <label for="sidebarToggle" class="sidebar-toggle-btn">
        <i class="fas fa-bars"></i>
    </label>

    <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white">
        <a href="{{ route('dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <img src="{{ asset('assets/images/agen_logo.png') }}" alt="Logo Agen" class="sidebar-logo me-2">
            <span class="fs-4 d-lg-inline">Agen</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active' : '' }}" aria-current="page">
                    <i class="fas fa-home me-2"></i>
                    <span class="d-lg-inline">Início</span>
                </a>
            </li>
            <li>
                <a href="{{ route('agendas.index') }}" class="nav-link text-white {{ request()->routeIs('agendas.*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-alt me-2"></i>
                    <span class="d-lg-inline">Agendas</span>
                </a>
            </li>
            <li>
                <a href="{{ route('consultores.index') }}" class="nav-link text-white {{ request()->routeIs('consultores.*') ? 'active' : '' }}">
                    <i class="fas fa-users me-2"></i>
                    <span class="d-lg-inline">Colaboradores</span>
                </a>
            </li>
            <li>
                <a href="{{ route('empresas.index') }}" class="nav-link text-white {{ request()->routeIs('empresas.*') ? 'active' : '' }}">
                    <i class="fas fa-building me-2"></i>
                    <span class="d-lg-inline">Empresas Parceiras</span>
                </a>
            </li>
            <li>
                <a href="{{ route('enviar-agendas.index') }}" class="nav-link text-white {{ request()->routeIs('enviar-agendas.index') ? 'active' : '' }}">
                    <i class="fas fa-envelope-open-text me-2"></i>
                    <span class="d-lg-inline">Enviar Agendas</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile.edit') }}" class="nav-link text-white {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                    <i class="fas fa-cogs me-2"></i>
                    <span class="d-lg-inline">Configurações</span>
                </a>
            </li>
            <hr>
            
        </ul>
        <hr>
        
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" class="nav-link text-white" 
                onclick="event.preventDefault(); this.closest('form').submit();">
                <i class="fas fa-sign-out-alt me-2"></i>Sair
            </a>
        </form>
    </div>

    <main class="main-content-with-sidebar p-4">
        {{ $slot }}
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
</body>
</html>
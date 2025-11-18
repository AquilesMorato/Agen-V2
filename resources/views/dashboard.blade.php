<x-app-layout>
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
        </div>

        <div class="container-fluid py-4">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <div class="col">
                    <div class="card text-white bg-primary mb-3 shadow-sm dashboard-card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-users me-2"></i> Colaboradores Ativos</h5>
                            <p class="card-text display-4">{{ $consultoresAtivos }}</p>
                            <a href="{{ route('consultores.index') }}" class="text-white text-decoration-none stretched-link">Ver Colaboradores <i class="fas fa-arrow-circle-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-white bg-success mb-3 shadow-sm dashboard-card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-calendar-check me-2"></i> Agendas Confirmadas</h5>
                            <p class="card-text display-4">{{ $agendasConfirmadas }}</p>
                            <a href="{{ route('agendas.index') }}" class="text-white text-decoration-none stretched-link">Ver Agendas <i class="fas fa-arrow-circle-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-white bg-info mb-3 shadow-sm dashboard-card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-building me-2"></i> Empresas Parceiras</h5>
                            <p class="card-text display-4">{{ $totalEmpresas }}</p>
                            <a href="{{ route('empresas.index') }}" class="text-white text-decoration-none stretched-link">Ver Empresas <i class="fas fa-arrow-circle-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-white bg-warning mb-3 shadow-sm dashboard-card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-clipboard-list me-2"></i> Agendas Pendentes</h5>
                            <p class="card-text display-4">{{ $agendasPendentes }}</p>
                            <a href="{{ route('agendas.index') }}" class="text-dark text-decoration-none stretched-link">Ver Agendas <i class="fas fa-arrow-circle-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5 text-center">
                <p class="text-muted">Utilize o menu lateral para navegar entre as seções do sistema.</p>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Gerenciar Agendas</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('agendas.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-2"></i> Nova Agenda
                </a>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Listagem de Agendas</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Consultor</th>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Empresa Cliente</th>
                                <th>Assunto</th>
                                <th>Status</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agendas as $agenda)
                            <tr>
                                <td>{{ $agenda->user->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($agenda->data)->format('d/m/Y') }}</td>
                                <td>{{ $agenda->hora }}</td>
                                <td>{{ $agenda->empresa->nome_empresa }}</td>
                                <td>{{ $agenda->assunto }}</td>
                                <td>
                                    @php
                                        $class = 'bg-warning text-dark';
                                        if ($agenda->status == 'Confirmado') $class = 'bg-success';
                                        if ($agenda->status == 'Cancelado') $class = 'bg-danger';
                                    @endphp
                                    <span class="badge {{ $class }}">{{ $agenda->status }}</span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('agendas.edit', $agenda->id) }}" class="btn btn-sm btn-warning me-1" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('agendas.destroy', $agenda->id) }}" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Cancelar" onclick="return confirm('Tem certeza que deseja excluir/cancelar esta agenda?')">
                                            <i class="fas fa-times-circle"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
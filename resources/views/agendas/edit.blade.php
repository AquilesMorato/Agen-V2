<x-app-layout>
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Editar Agenda</h1>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('agendas.update', $agenda->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="user_id" class="form-label">Consultor</label>
                            <select class="form-select" id="user_id" name="user_id" required>
                                <option value="">Selecione um consultor...</option>
                                @foreach ($consultores as $consultor)
                                    <option value="{{ $consultor->id }}" {{ $agenda->user_id == $consultor->id ? 'selected' : '' }}>
                                        {{ $consultor->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="empresa_id" class="form-label">Empresa Cliente</label>
                            <select class="form-select" id="empresa_id" name="empresa_id" required>
                                <option value="">Selecione uma empresa...</option>
                                @foreach ($empresas as $empresa)
                                    <option value="{{ $empresa->id }}" {{ $agenda->empresa_id == $empresa->id ? 'selected' : '' }}>
                                        {{ $empresa->nome_empresa }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="data" class="form-label">Data</label>
                            <input type="date" class="form-control" id="data" name="data" value="{{ $agenda->data }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="hora" class="form-label">Hora</label>
                            <input type="time" class="form-control" id="hora" name="hora" value="{{ $agenda->hora }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="Pendente" {{ $agenda->status == 'Pendente' ? 'selected' : '' }}>Pendente</option>
                                <option value="Confirmado" {{ $agenda->status == 'Confirmado' ? 'selected' : '' }}>Confirmado</option>
                                <option value="Cancelado" {{ $agenda->status == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="assunto" class="form-label">Assunto</label>
                            <input type="text" class="form-control" id="assunto" name="assunto" value="{{ $agenda->assunto }}" required>
                        </div>
                        <div class="col-12 text-end">
                            <a href="{{ route('agendas.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
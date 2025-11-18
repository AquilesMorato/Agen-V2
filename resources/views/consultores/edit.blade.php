<x-app-layout>
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Editar Colaborador</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <h5 class="alert-heading">Ocorreram erros:</h5>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('consultores.update', $consultor->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $consultor->name) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $consultor->email) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="tel" class="form-control" id="telefone" name="telefone" value="{{ old('telefone', $consultor->telefone) }}" placeholder="(XX) XXXXX-XXXX">
                        </div>
                        <div class="col-md-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="Ativo" {{ (old('status', $consultor->status) == 'Ativo') ? 'selected' : '' }}>Ativo</option>
                                <option value="Inativo" {{ (old('status', $consultor->status) == 'Inativo') ? 'selected' : '' }}>Inativo</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="role" class="form-label">Função no Sistema</label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="Consultor" {{ (old('role', $consultor->role) == 'Consultor') ? 'selected' : '' }}>Consultor</option>
                                <option value="Admin" {{ (old('role', $consultor->role) == 'Admin') ? 'selected' : '' }}>Admin (Techlead)</option>
                            </select>
                        </div>
                        <div class="col-12 text-end">
                            <a href="{{ route('consultores.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
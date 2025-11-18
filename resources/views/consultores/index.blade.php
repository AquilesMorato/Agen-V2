<x-app-layout>
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Gerenciar Colaboradores</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#consultorModal">
                    <i class="fas fa-user-plus me-2"></i> Novo Colaborador
                </button>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Lista de Colaboradores</h5>
            </div>
            <div class="card-body">

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

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Função</th>
                                <th>Status</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody id="consultoresTabelaBody">
                            @foreach ($consultores as $consultor)
                                <tr>
                                    <th>{{ $consultor->id }}</th>
                                    <td>{{ $consultor->name }}</td>
                                    <td>{{ $consultor->email }}</td>
                                    <td>{{ $consultor->telefone }}</td>
                                    <td>{{ $consultor->role }}</td>
                                    <td>
                                        <span class="badge {{ $consultor->status == 'Ativo' ? 'bg-success' : 'bg-danger' }}">
                                            {{ $consultor->status }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('consultores.edit', $consultor->id) }}" class="btn btn-sm btn-warning me-1" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('consultores.destroy', $consultor->id) }}" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir?')">
                                                <i class="fas fa-trash-alt"></i>
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

    <div class="modal fade" id="consultorModal" tabindex="-1" aria-labelledby="consultorModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="POST" action="{{ route('consultores.store') }}">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title" id="consultorModalLabel">Novo Colaborador</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                  <label for="name" class="form-label">Nome Completo</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">E-mail</label>
                  <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Senha</label>
                  <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                  <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
                <div class="mb-3">
                  <label for="telefone" class="form-label">Telefone</label>
                  <input type="tel" class="form-control" id="telefone" name="telefone" value="{{ old('telefone') }}" placeholder="(XX) XXXXX-XXXX">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="status" class="form-label">Status</label>
                      <select class="form-select" id="status" name="status" required>
                        <option value="Ativo" selected>Ativo</option>
                        <option value="Inativo">Inativo</option>
                      </select>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="role" class="form-label">Função no Sistema</label>
                      <select class="form-select" id="role" name="role" required>
                        <option value="Consultor" selected>Consultor</option>
                        <option value="Admin">Admin (Techlead)</option>
                      </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</x-app-layout>
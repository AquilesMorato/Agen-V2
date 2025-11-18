<x-app-layout>
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Gerenciar Empresas Parceiras</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('empresas.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-2"></i> Nova Empresa
                </a>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Lista de Empresas Parceiras</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome da Empresa</th>
                                <th>Contato Principal</th>
                                <th>Telefone</th>
                                <th>E-mail</th>
                                <th>Ramo de Atividade</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empresas as $empresa)
                            <tr>
                                <th>{{ $empresa->id }}</th>
                                <td>{{ $empresa->nome_empresa }}</td>
                                <td>{{ $empresa->contato_principal }}</td>
                                <td>{{ $empresa->telefone }}</td>
                                <td>{{ $empresa->email }}</td>
                                <td>{{ $empresa->ramo_atividade }}</td>
                                <td class="text-center">
                                    <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-sm btn-warning me-1" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('empresas.destroy', $empresa->id) }}" style="display:inline-block;">
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
</x-app-layout>
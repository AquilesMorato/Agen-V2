<x-app-layout>
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Nova Empresa Parceira</h1>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('empresas.store') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nome_empresa" class="form-label">Nome da Empresa</label>
                            <input type="text" class="form-control" id="nome_empresa" name="nome_empresa" value="{{ old('nome_empresa') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="contato_principal" class="form-label">Contato Principal</label>
                            <input type="text" class="form-control" id="contato_principal" name="contato_principal" value="{{ old('contato_principal') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="tel" class="form-control" id="telefone" name="telefone" value="{{ old('telefone') }}" placeholder="(XX) XXXXX-XXXX">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="col-md-12">
                            <label for="ramo_atividade" class="form-label">Ramo de Atividade</label>
                            <input type="text" class="form-control" id="ramo_atividade" name="ramo_atividade" value="{{ old('ramo_atividade') }}">
                        </div>
                        <div class="col-12 text-end">
                            <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Salvar Empresa</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
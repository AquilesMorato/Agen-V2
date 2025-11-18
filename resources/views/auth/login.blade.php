<x-guest-layout>
    <div class="auth-card text-center">
        <img src="{{ asset('assets/images/agen_logo.png') }}" alt="Logo Agen" class="img-fluid mb-4" style="max-height: 80px;">
        <h2 class="mb-4">Acesse sua conta</h2>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3 text-start">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="seu@email.com" :value="old('email')" required autofocus>
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
            </div>

            <div class="mb-4 text-start">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-3">Entrar</button>
            
            <p class="text-center">
                <a href="#" class="text-decoration-none">Esqueceu sua senha?</a>
            </p>
            <p class="text-center mt-3">
                Não tem uma conta? <a href="{{ route('register') }}" class="text-decoration-none">Cadastre-se aqui</a>
            </p>
        </form>
    </div>
</x-guest-layout>
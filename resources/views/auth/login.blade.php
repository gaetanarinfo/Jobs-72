@extends('layouts.app')

@section('title', '- Connexion')

@section('content')

    @include('components.head')

    <div class="container mt-3">
        <div class="row justify-content-center">

            <div class="col-md-12 mb-3 text-center">
                <img src="images/login-rounded-right.png" alt="user" />
            </div>

            <div class="col-md-8">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <i class="fas fa-check mr-1 text-success"></i>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <i class="fas fa-times mr-1 text-danger"></i>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">{{ __('Connectez-vous avec Jobs-72') }}</div>

                    <div class="container text-center">
                        <h5 class="mt-3 mb-3">Se connecter / S'enregistrer avec un compte social</h5>
                        <p>
                            <!-- Lien de redirection vers Google -->
                            <a href="{{ route('socialite.redirect', 'google') }}"
                                title="Connexion/Inscription avec Google" class="btn btn-danger mr-2">Continuer avec
                                Google</a>

                            <!-- Lien de redirection vers Facebook -->
                            <a href="{{ route('socialite.redirect', 'facebook') }}"
                                title="Connexion/Inscription avec Facebook" class="btn btn-info mr-2">Continuer avec
                                Facebook</a>

                            <!-- Lien de redirection vers Github -->
                            <a href="{{ route('socialite.redirect', 'github') }}"
                                title="Connexion/Inscription avec Github" class="btn btn-secondary">Continuer avec
                                Github</a>
                        </p>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Adresse e-mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Se souvenir de moi') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-secondary mr-3">
                                        {{ __('Connexion') }}
                                    </button>

                                    <a href="{{ route('register') }}" class="btn btn-success mr-3">
                                        {{ __('Crée un compte ?') }}
                                    </a>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link mt-3" href="{{ route('password.request') }}">
                                            {{ __('Mot de passe oublié ?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

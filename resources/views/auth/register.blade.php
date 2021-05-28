@extends('layouts.app')

@section('title', trans('- Crée un compte'))

@section('content')

    <link rel="stylesheet" type="text/css" href="css/input-file.css">

    @include('components.head')

    <div class="container mt-3">
        <div class="row justify-content-center">

            <div class="col-md-12 mb-3 text-center">
                <img src="images/user.png" alt="user" />
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
                    <div class="card-header">{{ __('Vous n’avez pas de compte ?') }}</div>

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('registers') }}">

                            @csrf

                            <div class="form-group row">
                                <label
                                    class="col-md-4 col-form-label text-md-right">{{ __('Devenir recruteur ?') }}</label>

                                <div class="col-md-6">

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="recruter[]" id="recruter"
                                            value="0" onclick="changeCheck()" />
                                        <label class="form-check-label" for="recruterL" id="recruterL">Non</label>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nom d\'utilisateur') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Adresse e-mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Comfirmer le mot de passe') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row" id="cv">
                                <label for="cvdoc"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Votre CV / Format du fichier : PDF') }}</label>

                                <div class="col-md-6">
                                    <input type="file" name="cvdoc" @error('cvdoc') is-invalid @enderror
                                        accept="application/pdf" id="cvdoc" class="form-control" />

                                    @error('cvdoc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-2 mb-2">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="0" id="cgu-confirm"
                                            required />
                                        <label class="form-check-label" for="cgu-confirm">
                                            <a href="" data-mdb-toggle="modal" data-mdb-target="#cgu"
                                                title="Conditions générale d’utilisation">{{ __('Conditions Général D\'utilisation') }}</a>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0 mt-2">
                                <div class="col-md-12">
                                    <button id="submit" type="submit" class="btn btn-secondary" disabled>
                                        {{ __('Valider l\'inscription') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function changeCheck() {
            var x = document.getElementById("recruter"),
                recruterL = document.getElementById('recruterL');

            const cv = document.getElementById("cv");

            if (x.value == "1") {
                x.value = "0";
                recruterL.innerHTML = "Non";
                cv.style.display = "";
            } else {
                x.value = "1";
                recruterL.innerHTML = "Oui";
                cv.style.display = "none";
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="js/custom-file-input.js"></script>

    <script src="js/input-file.js"></script>

    <script type="text/javascript">
        new InputFile({
            // options
        });

    </script>

    <script type="text/javascript">
        var cgu = document.getElementById('cgu-confirm'),
            button = document.getElementById('submit');

        cgu.onchange = function() {
            this.checked = true;
            button.disabled = false;
        };

    </script>
@endsection

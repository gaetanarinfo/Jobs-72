@extends('layouts.app')

@section('title', trans('- Contactez-nous'))

@section('content')

{!! NoCaptcha::renderJs() !!}

    @include('components.head')

    <div class="container mt-3">
        <div class="row justify-content-center">

            <div class="col-md-12 mb-3 text-center">
                <img style="width: 200px;" src="images/mail.png" alt="mail" />
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
                    <div class="card-header">{{ __('Besoin d\'un coup de main ? On s\'occupe de vous !') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('mail-post') }}">

                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Votre nom et prénom') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Votre adresse e-mail') }}</label>

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
                                <label for="subject"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Votre sujet') }}</label>

                                <div class="col-md-6">
                                    <input id="subject" type="text"
                                        class="form-control @error('subject') is-invalid @enderror" name="subject"
                                        value="{{ old('subject') }}" required autocomplete="subject">

                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="content"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Votre message') }}</label>

                                <div class="col-md-6">
                                    <textarea id="content" class="form-control" name="content" required
                                        autocomplete="content" style="height: 150px" required></textarea>
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

                            <div class="form-group row mt-2 mb-2 text-center {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    {!! app('captcha')->display() !!}
                                    @if ($errors->has('g-recaptcha-response'))
                                        <div class="alert alert-danger alert-block mt-3 mb-2">
                                            <i class="fas fa-times mr-1 text-danger"></i>
                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0 mt-2">
                                <div class="col-md-12">
                                    <button id="submit" type="submit" class="btn btn-secondary" disabled>
                                        {{ __('Envoyer le message') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var cgu = document.getElementById('cgu-confirm'),
            button = document.getElementById('submit');

        cgu.onchange = function() {
            this.checked = true;
            button.disabled = false;
        };

    </script>

@endsection

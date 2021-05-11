@extends('layouts.app')

@section('title', 'Vérification de l\'email')

@section('content')

    @include('components.head')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12 mb-3 text-center">
                <img src="../images/change-password.png" width="200px" alt="user" />
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
                    <div class="card-header">{{ __('Vérifiez votre adresse e-mail') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                            </div>
                        @endif

                        {{ __('Avant de continuer, veuillez vérifier votre e-mail pour un lien de vérification.') }}
                        {{ __('Si vous n\'avez pas reçu l\'e-mail') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('Cliquez ici pour en demander un autre') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

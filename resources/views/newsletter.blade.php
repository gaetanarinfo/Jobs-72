@extends('layouts.app')

@section('content')

    @include('components.head')

    <div class="container mt-3">

        <div class="col-md-12 mb-3 text-center">
            <img src="images/newsletter.png" width="200px" alt="newsletter"/>
        </div>

        <section>

            <form method="post" action="{{ url('newsletter') }}">
                @csrf

                <div class="col-md-6 m-auto">

                    @if (\Session::has('success'))
                        <div class="alert alert-success alert-block">
                            <i class="fas fa-check mr-1 text-success"></i>
                            <strong>{{ \Session::get('success') }}</strong>
                        </div>
                    @endif
                    @if (\Session::has('failure'))
                        <div class="alert alert-danger alert-block">
                            <i class="fas fa-times mr-1 text-danger"></i>
                            <strong>{{ \Session::get('failure') }}</strong>
                        </div>
                    @endif


                    <div class="card">
                        <div class="card-header">Inscription à notre Newsletter</div>

                        <div class="card-body">

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control " name="email" value="" required=""
                                        autocomplete="email" autofocus="">
                                </div>
                            </div>

                            <div class="form-group row mb-0 mt-3">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-secondary">S'incrire</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </form>
        </section>
    </div>
@endsection

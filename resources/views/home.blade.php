@extends('layouts.app')

@section('content')

    @include('components.head')

    @if ($message = Session::get('success'))
        <div class="col-md-4 text-center mt-3 mb-0" style="margin: 0 auto;">
            <div class="alert alert-success alert-block">
                <i class="fas fa-check mr-1 text-success"></i>
                <strong>{{ $message }}</strong>
            </div>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="col-md-4 text-center mt-3 mb-0" style="margin: 0 auto;">
            <div class="alert alert-danger alert-block">
                <i class="fas fa-times mr-1 text-danger"></i>
                <strong>{{ $message }}</strong>
            </div>
        </div>
    @endif

    @include('components.news')
    <hr />
    @include('components.emplois')
    <hr />
    @include('components.carriere')
    <hr />
    @include('components.recruter')
    <hr />
    @include('components.search-emplois')

@endsection

@extends('layouts.app')

@section('content')

  @include('components.head')

  @include('components.news')
  <hr/>
  @include('components.emplois')
  <hr/>
  @include('components.search-emplois')

@endsection

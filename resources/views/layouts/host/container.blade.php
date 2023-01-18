@extends('layouts.index')

@section('app', $portal)

@push('styles')
    <link href="{{ asset('assets/minible/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/minible/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/minible/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
@endpush

@section('body')

    @yield('container')

@endsection

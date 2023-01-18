@extends('layouts.error')

@section('page', 'Error 419')
@section('app', 'Page Expired')

@section('h1')
    <h1>Page Expired</h1>
@endsection

@section('p')
    <p>
        It appears the CSRF token for the requested resource <br/>
        <a href="#!">{{ url()->current() }}</a>
        has exipred.
    </p>
@endsection

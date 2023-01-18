@extends('layouts.error')

@section('page', 'Error 401 ')
@section('app', 'Unauthorized Access')

@section('h1')
    <h1>Unauthorized Access</h1>
@endsection

@section('p')
    <p>
        It appears you're not authorized to access the requested resource <br />
        <a href="#!">{{ url()->current() }}</a>
    </p>
@endsection

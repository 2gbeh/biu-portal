@extends('layouts.error')

@section('page', 'Error 404')
@section('app', 'Page Not Found')

@section('h1')
    <h1>Page Not Found</h1>
@endsection

@section('p')
    <p>
        It appears the requested resource
        <a href="#!">{{ url()->current() }}</a> <br />
        does not exist or has been moved permanently.
    </p>
@endsection

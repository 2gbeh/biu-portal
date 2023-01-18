@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')

    @includeIf('shared.div', ['div' => ['row', 'col-lg-12', 'card', 'card-body']])

    <x-invoice.header />
    <x-invoice.section />
    <x-invoice.main />
    <x-invoice.footer />

    @includeIf('shared.div', ['div' => 4])

@endsection

@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <x-card.inbox :p="$data->noticeboard_props" />
@endsection

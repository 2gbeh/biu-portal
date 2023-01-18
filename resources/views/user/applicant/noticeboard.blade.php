@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <div class="row">
        <div class="col-12">
            <x-table.inbox :p="$data->noticeboard_props" />
        </div>
    </div>
@endsection

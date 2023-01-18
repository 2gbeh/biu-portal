@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <div class="row">
        <div class="col-12">
            <x-table.editable :p="$data->app_settings_props" />
        </div>
    </div>
@endsection

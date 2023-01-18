@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <x-form.upload :action="$data->upload_passport_props->action" />
@endsection

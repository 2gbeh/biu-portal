@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body" role="toolbar">
                    <x-table.toolbar :p="$data->create_course_props['toolbar']" />

                    <x-form.host>
                        <x-form.items :p="$data->create_course_props['form']" />
                        <x-form.buttons :p="['clear', 'save']" />
                    </x-form.host>
                </div>
            </div>
        </div>
    </div>
@endsection

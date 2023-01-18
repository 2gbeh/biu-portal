@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <div class="row">
        @foreach ($data->alumni_props as $item)
            <x-card.user :p="$item" />
        @endforeach
    </div>

    <div class="row mt-3">
        <div class="col-xl-12">
            <div class="text-center my-3">
                <a href="javascript:void(0);" class="text-primary"><i
                        class="mdi mdi-loading mdi-spin font-size-20 align-middle me-2"></i> Load more </a>
            </div>
        </div>
    </div>
@endsection

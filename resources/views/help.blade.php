@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-5">
                            <div class="text-center">
                                <h5>{!! $data->title_card_props['title'] !!}</h5>
                                <p class="text-muted">
                                    {!! $data->title_card_props['summary'] !!}
                                </p>
                                <div>
                                    @foreach ($data->title_card_props['action'] as $item)
                                        <a class="btn btn-{{ $item['a']['color'] ?? 'primary' }} mt-2 me-2 waves-effect waves-light"
                                            href="{{ $item['a']['href'] }}" target="_new">
                                            <i class="{{ $item['i'] }} mx-1"></i>
                                            {{ $item['text'] }}
                                        </a> &nbsp;
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-xl-3 col-sm-5 mx-auto">
                            <div>
                                <img src="{{ asset('assets/minible/images/faqs-img.png') }}" alt=""
                                    class="img-fluid mx-auto d-block">
                            </div>
                        </div>

                        <div class="col-xl-8">
                            <x-accordion :p="$data->contact_us_props" />

                            <x-accordion :p="$data->about_us_props" />
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

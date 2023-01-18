@extends('layouts.index')

@section('app', $portal)

@push('fonts')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
@endpush

@push('styles')
    <link href="{{ asset('assets/windmill/css/tailwind.output.css') }}" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="{{ asset('assets/windmill/js/alpine.min.js') }}" defer></script>
    <script src="{{ asset('assets/windmill/js/init-alpine.js') }}"></script>
@endpush

@section('body')

    @yield('container')

@endsection

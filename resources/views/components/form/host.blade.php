@props([
    'id' => 'form-host',
    'action' => 'dashboard',
    'method' => 'POST',
    'autocomplete' => 'off',
])

@php
$restful = !in_array(strtoupper($method), ['GET', 'POST']);

if ($restful) {
    $method_ = strtoupper($method);
    $method = 'POST';
}
@endphp

<form id="{{ $id }}" action="{{ route($action) }}" method="{{ $method }}" autocomplete="{{ $autocomplete }}"
    {{ $attributes->merge(['class']) }} enctype="multipart/form-data">
    @csrf
    @if ($restful)
        @method($method_)
    @endif

    {{ $slot }}
</form>

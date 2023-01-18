@props([
    'p' => [
        'col' => 4,
        'type' => 'search',
        'label' => 'Username',
        'name' => 'username',
        'placeholder' => 'Enter username',
        'datalist' => $_SERVER,
        'constraint' => 'required', // autofocus|required|readonly|disabled|multiple
    ],
])

@push('styles')
    <link href="{{ asset('assets/minible/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts_')
    <script src="{{ asset('assets/minible/libs/select2/js/select2.min.js') }}"></script>
@endpush

<x-form.control :p="$p" />

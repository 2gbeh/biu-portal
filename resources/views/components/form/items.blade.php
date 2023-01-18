@props([
    'p' => [
        [
            [
                'col' => 4,
                'type' => 'search',
                'label' => 'Username',
                'name' => 'username',
                'placeholder' => 'Enter username',
                'datalist' => $_SERVER,
                'constraint' => 'required', // autofocus|required|readonly|disabled|multiple
            ],
            [
                'col' => 4,
                'type' => 'file',
                'label' => 'Passport',
                'name' => 'photo',
                'accept' => 'image/*',
                'constraint' => 'required multiple',
            ],
            [
                'col' => 4,
                'type' => 'select',
                'label' => 'Gender',
                'name' => 'sex',
                'value' => 'REQUEST_METHOD',
                'options' => $_SERVER,
                'constraint' => 'required',
            ],
        ],
        [
            [
                'type' => 'textarea',
                'label' => 'Address',
                'name' => 'address',
                'placeholder' => 'Home address',
                'constraint' => 'required',
            ],
        ],
    ],
])

@push('styles')
    <link href="{{ asset('assets/minible/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts_')
    <script src="{{ asset('assets/minible/libs/select2/js/select2.min.js') }}"></script>
@endpush

@foreach ($p as $items)
    <div class="row">
        @foreach ($items as $item)
            <x-form.control :p="$item" />
        @endforeach
    </div>
@endforeach

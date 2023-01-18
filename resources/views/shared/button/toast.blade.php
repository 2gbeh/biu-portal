@php
$button_toast_text = $button_toast_text ?? 'Application Submitted';
$button_toast_icon = $button_toast_icon ?? 'fas fa-check-circle';
$button_toast_color = $button_toast_color ?? 'success';
$button_toast_button = $button_toast_button ?? 'Complete';
@endphp

@push('styles')
    <link href="{{ asset('assets/minible/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts_')
    <script src="{{ asset('assets/minible/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/minible/js/pages/sweet-alerts.init.js') }}"></script>
@endpush

<button type="submit" data-text="{{ $button_toast_text }}" id="sa-position"
    class="btn btn-{{ $button_toast_color }} waves-effect waves-light">

    <i class="{{ $button_toast_icon }} px-1"></i>

    {{ $button_toast_button }}
</button>

@php
$button_sign_in_class = $button_sign_in_class ?? [];
$button_sign_in_text = $button_sign_in_text ?? 'Log in';
@endphp

<button type="submit" class="{{ trans('tw.btn.main', $button_sign_in_class) }}">
    <img src="{{ asset('images/dual_ring_blue.gif') }}" alt="..." />
    <span>{{ $button_sign_in_text }}</span>
</button>
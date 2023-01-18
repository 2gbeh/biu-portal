@php
$button_clear_color = $button_clear_color ?? 'secondary';
$button_clear_icon = $button_clear_icon ?? 'fas fa-times-circle';
$button_clear_text = $button_clear_text ?? 'Clear';
@endphp

<button type="reset" class="btn btn-{{ $button_clear_color }} waves-effect">
    <i class="{{ $button_clear_icon }} px-1"></i>
    {{ $button_clear_text }}
</button>

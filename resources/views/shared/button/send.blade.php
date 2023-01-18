@php
$button_send_color = $button_send_color ?? 'primary';
$button_send_icon = $button_send_icon ?? 'fas fa-paper-plane';
$button_send_text = $button_send_text ?? 'Send';
@endphp

&nbsp;
<button type="submit" class="btn btn-{{ $button_send_color }} waves-effect">
    <i class="{{ $button_send_icon }} px-1"></i>
    {{ $button_send_text }}
</button>

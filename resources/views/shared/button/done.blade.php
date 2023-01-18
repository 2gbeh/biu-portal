@php
$button_done_color = $button_done_color ?? 'primary';
$button_done_icon = $button_done_icon ?? 'fas fa-check-circle';
$button_done_text = $button_done_text ?? 'Done';
@endphp

&nbsp;
<button type="submit" class="btn btn-{{ $button_done_color }} waves-effect">
    <i class="{{ $button_done_icon }} px-1"></i>
    {{ $button_done_text }}
</button>

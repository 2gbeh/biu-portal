@php
$button_next_color = $button_next_color ?? 'success';
$button_next_icon = $button_next_icon ?? 'fas fa-arrow-circle-right';
$button_next_text = $button_next_text ?? 'Next';
@endphp

&nbsp;
<button type="submit" name="_next" class="btn btn-{{ $button_next_color }} waves-effect">
    <i class="{{ $button_next_icon }} px-1"></i>
    {{ $button_next_text }}
</button>

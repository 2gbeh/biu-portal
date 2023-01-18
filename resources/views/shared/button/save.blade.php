@php
$button_save_color = $button_save_color ?? 'primary';
$button_save_icon = $button_save_icon ?? 'fas fa-save';
$button_save_text = $button_save_text ?? 'Save';
@endphp

&nbsp;
<button type="submit" class="btn btn-{{ $button_save_color }} waves-effect">
    <i class="{{ $button_save_icon }} px-1"></i>
    {{ $button_save_text }}
</button>

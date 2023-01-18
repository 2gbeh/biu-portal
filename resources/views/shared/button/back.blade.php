@php
$button_back_color = $button_back_color ?? 'danger';
$button_back_icon = $button_back_icon ?? 'fas fa-arrow-circle-left';
$button_back_text = $button_back_text ?? 'Back';
@endphp

<script type="text/javascript">
    const handleButtonBack = (this_) => {
      location.assign(this_.dataset.url);
    };
</script>

<button type="button" onclick="handleButtonBack(this)" class="btn btn-{{ $button_back_color }} waves-effect" 
data-url="{{ url()->previous() }}">
    <i class="{{ $button_back_icon }} px-1"></i>
    {{ $button_back_text }}
</button>

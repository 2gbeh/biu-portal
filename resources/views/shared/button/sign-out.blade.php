@php
$button_sign_out_action = $button_sign_out_action ?? 'admin/logout';
$button_sign_out_text = $button_sign_out_text ?? 'Logout';
@endphp

<script type="text/javascript">
    const handleButtonSignOut = (event, this_) => {
        event.preventDefault();
        if (confirm("Are you sure ?") === true) {
            this_.submit();
        }
    };
</script>

<form action="{{ url($button_sign_out_action) }}" onsubmit="handleButtonSignOut(event, this)" method="POST"
    class="logout-form">
    @csrf
    <button type="submit" style="min-width:90px; text-align:left;">
        {{ $button_sign_out_text }}
    </button>
</form>

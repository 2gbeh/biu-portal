@props([
    'id' => 'form-guest',
    'action' => 'admin/login',
    'method' => 'POST',
    'autocomplete' => 'off',
])

@php
$restful = !in_array(strtoupper($method), ['GET', 'POST']);

if ($restful) {
    $method_ = strtoupper($method);
    $method = 'POST';
}
@endphp

<script type="text/javascript">
    const handleFormGuest = (event, this_) => {
        event.preventDefault();
        $(this_.tagName)
            .find("button")
            .prop("disabled", true)
            .end()
            .find("button img")
            .css("visibility", "visible")
            .end()
            .find("button span")
            .text("processing...")
            .end();
        this_.submit();
    };
</script>

<form id="{{ $id }}" action="{{ url($action) }}" method="{{ $method }}" autocomplete="{{ $autocomplete }}"
    onsubmit="handleFormGuest(event, this)">
    @csrf
    @if ($restful)
        @method($method_)
    @endif

    {{ $slot }}
</form>

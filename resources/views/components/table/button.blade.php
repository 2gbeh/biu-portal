@props([
    'p' => (object) ['color' => 'light', 'data' => 'Web Checkout'],
])

@php
$p = is_array($p) ? (object) $p : $p;
@endphp

<td>
    <button class="btn btn-{{ $p->color }} btn-sm w-xs font-size-12">
        {{ $p->text }}
    </button>
</td>

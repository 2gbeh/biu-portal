@props([
    'p' => ['success' => 1 + 1 == 2],
    // 'p' => [$pi => 3.142],
    // 'p' => 'Active',
])

@php
if (is_array($p)) {
    $p['text'] = array_keys($p)[0];
    $p['eval'] = array_values($p)[0];
    $p['is_bool'] = is_bool($p['eval']) && $p['eval'] == true;
    $p['is_string'] = is_string($p['eval']) && $p['eval'] == $p['text'];
}
@endphp

@if (is_array($p))
    @if ($p['is_bool'] || $p['is_string'])
        <span class="badge text-success font-size-12">
            {{ $p['text'] }}
        </span>
    @endif
@endif

@if (is_string($p))
    <span class="text-success">
        {{ $p }}
    </span>
@endif

@props([
    'p' => ['danger' => 1 + 1 == 2],
    // 'p' => [$pi => 3.142],
])

@php
$p['text'] = array_keys($p)[0];
$p['eval'] = array_values($p)[0];
$p['is_bool'] = is_bool($p['eval']) && $p['eval'] == true;
$p['is_string'] = is_string($p['eval']) && $p['eval'] == $p['text'];
@endphp

@if ($p['is_bool'] || $p['is_string'])
    <span class="badge bg-soft-danger font-size-12">
        {{ $p['text'] }}
    </span>
@endif

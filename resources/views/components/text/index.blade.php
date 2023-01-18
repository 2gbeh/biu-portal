@props([
    'p' => ['color' => 'success', 'text' => 'Done'],
])

<span class="badge text-{{ $p['color'] ?? 'primary' }} font-size-12">
    {{ $p['text'] }}
</span>

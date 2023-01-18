@props([
    'p' => ['color' => 'success', 'text' => 'Done'],
])


<span class="badge bg-soft-{{ $p['color'] ?? 'primary' }} font-size-12" role="button">
    {{ $p['text'] }}
</span>

@props([
    'p' => date('Y-m-d H:i:s'),
])

<td class="text-muted font-size-13">
    {!! date('D, M j, Y \a\t H:i A', strtotime($p)) !!}
</td>

@props([
    'p' => (object) [
        'image' => 'images/avatar.png',
        'text' => 'Mark Legends',
    ],
])

@php
$p = is_array($p) ? (object) $p : $p;
@endphp

<td>
    @if (isset($p->image))
        <img src="{{ asset($p->image) }}" alt="" class="avatar-xs rounded-circle me-2">
    @else
        <div class="avatar-xs d-inline-block me-2">
            <span class="avatar-title rounded-circle bg-light text-body font-size-10 bg-soft-info">
                @php
                    $arr = explode(' ', $p->text);
                    if (count($arr) > 1) {
                        echo strtoupper($arr[0][0] . $arr[1][0]);
                    } else {
                        echo strtoupper($arr[0][0]);
                    }                    
                @endphp
            </span>
        </div>
    @endif
    <span>{!! $p->text !!}</span>
</td>

@php
$div = $div ?? ['card', 'card-body']; // card|2
@endphp

@switch(gettype($div))
    @case('integer')
        @for ($i = 0; $i < $div; $i++)
            </div>
        @endfor
    @break

    @case('string')
        <div class="{{ $div }}">
        @break

        @case('array')
            @foreach ($div as $d)
                <div class="{{ $d }}">
            @endforeach
        @break

        @default
    @endswitch

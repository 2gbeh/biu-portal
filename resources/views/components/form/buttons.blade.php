@props([
    'p' => ['clear', 'save', 'next'],
    // 'p' => ['clear', 'save'],
    // 'p' => ['next'],
])

<div class="row mt-0 pt-3" style="border-top:1px dotted #999;">
    @switch(count($p))
        @case(1)
            <div class="col-md-12" style="text-align:right;">
                @includeIf("shared.button.{$p[0]}")
            </div>
        @break

        @case(3)
            <div class="col-md-3">
                @includeIf("shared.button.{$p[0]}")
            </div>
            <div class="col-md-9" style="text-align:right;">
                @includeIf("shared.button.{$p[1]}")
                @includeIf("shared.button.{$p[2]}")
            </div>
        @break

        @default
            <div class="col-md-12" style="text-align:right;">
                @includeIf("shared.button.{$p[0]}")
                @includeIf("shared.button.{$p[1]}")
            </div>
    @endswitch
</div>

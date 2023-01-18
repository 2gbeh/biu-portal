@props([
    'p' => (object) [
        'value' => '34,152',
        'label' => 'Total Staff',
        'icon' => 'fi fi-rs-id-badge text-primary',
        'stats' => [
            [
                'arrow' => 'up',
                'color' => 'primary',
                'value' => '65%',
                'label' => 'Male',
            ],
            [
                'arrow' => 'down',
                'color' => 'danger',
                'value' => '35%',
                'label' => 'Female',
            ],
        ],
    ],
])

<div class="card">
    <div class="card-body">
        <div class="float-end mt-2">
            <i class="{{ $p->icon }} fs-2"></i>
        </div>
        <div>
            <h4 class="mb-1 mt-1">
                <span data-plugin="counterup">{{ $f::cash($p->value) }}</span>
            </h4>
            <p class="text-muted mb-0 fw-bol">{{ $p->label }}</p>
        </div>
        <p class="text-muted mt-3 mb-0">
            @foreach ($p->stats as $stat)
                <span class="text-{{ $stat['color'] }} me-1">
                    <i class="mdi mdi-arrow-{{ $stat['arrow'] }}-bold me-1"></i>
                    <var style="margin-left:-5px;font-style:normal;">
                        {{ $stat['value'] }}
                    </var>
                </span> 
                <span style="margin-left:-3px;">{!! $stat['label'] !!}</span> &nbsp;
            @endforeach
        </p>
    </div>
</div>

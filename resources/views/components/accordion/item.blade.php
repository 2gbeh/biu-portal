@aware([
    'p' => (object) [
        'question' => 'What is HWP Labs ?',
        'answer' => '<b><abbr title="Hello World Project">HWP</abbr> Labs</b> is a Nigerian-base tech startup specialized in enterprise software development and training.',
    ],
])

@php
$p = is_array($p) ? (object) $p : $p;
@endphp

<div>
    <div class="d-flex align-items-start mt-4">
        <div class="flex-shrink-0 me-3">
            <div class="avatar-xs">
                <div class="avatar-title rounded-circle bg-soft-success text-success font-size-22">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
        </div>
        <div class="flex-grow-1">
            <h5 class="font-size-16 mt-1">{!! $p->question !!}</h5>
            <p class="text-muted">{!! $p->answer !!}</p>
        </div>
    </div>
</div>

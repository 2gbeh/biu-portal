@props([
    'p' => (object) [
        'id' => 'faqs',
        'expanded' => true,
        'columned' => true,
        'title' => 'General Questions',
        'subtitle' => 'General Questions',
        'list' => [
            [
                'question' => 'What is Lorem Ipsum ?',
                'answer' => 'If several languages coalesce, the grammar of the resulting language is more simple.',
            ],
            [
                'question' => 'Where does it come from ?',
                'answer' => 'Everyone realizes why a new common language would be desirable one could refuse to pay expensive translators.',
            ],
            [
                'question' => 'Why do we use it ?',
                'answer' => 'Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary.',
            ],
        ],
    ],
])

@php
$p->id = 'x-accordion_' . $p->id;
$p->collapse = $p->expanded === true ? 'show' : '';

if ($p->columned) {
    $n = count($p->list);

    if ($n % 2 == 0) {
        $div = $n / 2;
    } else {
        $div = ($n + 1) / 2;
    }

    $p->list_l = array_slice($p->list, 0, $div);
    $p->list_r = array_slice($p->list, $div);

    // dd($p->list_l, $p->list_r);
}
@endphp

<div id="faqs-accordion" class="custom-accordion mt-5 mt-xl-0">
    <div class="card border shadow-none">
        <a href="#{{ $p->id }}" class="text-dark" data-bs-toggle="collapse" aria-haspopup="true"
            aria-expanded="{{ $p->expanded }}" aria-controls="{{ $p->id }}">
            <div class="bg-light p-3">

                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar-xs">
                            <div class="avatar-title rounded-circle bg-soft-primary font-size-22">
                                <i class="fas fa-question-circle text-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="font-size-16 mb-1">{!! $p->title !!}</h5>
                        <p class="text-muted text-truncate mb-0">{!! $p->subtitle ?? 'Frequently Asked Questions' !!}</p>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="mdi mdi-chevron-up accor-down-icon font-size-16"></i>
                    </div>
                </div>
            </div>
        </a>

        <div id="{{ $p->id }}" class="collapse {{ $p->collapse }}" data-bs-parent="#faqs-accordion">
            <div class="p-4">
                <div class="row">
                    @if ($p->columned)
                        <div class="col-md-6">
                            @foreach ($p->list_l as $item)
                                <x-accordion.item :p="['question' => $item['question'], 'answer' => $item['answer']]" />
                            @endforeach
                        </div>

                        <div class="col-md-6">
                            @foreach ($p->list_r as $item)
                                <x-accordion.item :p="['question' => $item['question'], 'answer' => $item['answer']]" />
                            @endforeach
                        </div>
                    @else
                        <div class="col-md-12">
                            @foreach ($p->list as $item)
                                <x-accordion.item :p="['question' => $item['question'], 'answer' => $item['answer']]" />
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

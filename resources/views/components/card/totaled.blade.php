@props([
    'p' => (object) [
        'title' => 'Social Media Engagement',
        'list' => [['bg' => 'primary', 'i' => 'mdi mdi-facebook', 'h5' => 'Facebook', 'p' => '125 sales'], ['bg' => 'info', 'i' => 'mdi mdi-twitter', 'h5' => 'Twitter', 'p' => '112 sales'], ['bg' => 'pink', 'i' => 'mdi mdi-instagram', 'h5' => 'Instagram', 'p' => '104 sales']],
    ],
])

@php
$cols = 3;
$size = count($p->list);
$rows = $size / $cols;
$k = -1;
//
@endphp

<div class="card">
    <div class="card-body">
        @isset($p->menu)
            <div class="float-end">
                <div class="dropdown">
                    <a class=" dropdown-toggle" href="#" id="dropdownMenuButton2" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted">
                            {{ $p->menu[0] }}
                            <i class="mdi mdi-chevron-down ms-1"></i>
                        </span>
                    </a>
                    @if (count($p->menu) > 1)
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                            @foreach ($p->menu as $item)
                                <a class="dropdown-item" href="#!">{{ $item }}</a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        @endisset

        <h4 class="card-title fw-normal">{{ $p->title }}</h4>

        @foreach ($p->list as $key => $value)
            <div class="row mt-0">
                @foreach ($value as $item)
                    <div class="col-4">
                        <div class="social-source text-center mt-3">
                            <div class="avatar-xs mx-auto mb-3">
                                <span
                                    class="avatar-title rounded-circle bg-{{ $item['bg'] ?? $f::rand() }} font-size-16">
                                    <i class="{{ $item['i'] }} text-white mt-1"></i>
                                </span>
                            </div>
                            <h5 class="font-size-18">{{ $item['p'] }}</h5>
                            <p class="text-muted mb-0">{{ $f::wrap($item['h5'], 10) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>

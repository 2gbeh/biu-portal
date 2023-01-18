@props([
    'p' => (object) [
        'title' => 'Recent Activity',
        'menu' => ['Recent', 'By Users'],
    ],
])

<div class="card" style="min-height:30em;max-height:30em;">
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
        
        <h4 class="card-title mb-4 fw-normal">{{ $p->title }}</h4>

        <ol class="activity-feed mb-0 ps-2" data-simplebar style="max-height: 339px;">
            {{ $slot }}
        </ol>

    </div>
</div>

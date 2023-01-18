@props([
    'p' => [
        [
            'id' => 'about',
            'icon' => 'uil uil-user-circle',
            'text' => 'About',
        ],
        [
            'id' => 'tasks',
            'icon' => 'uil uil-clipboard-notes',
            'text' => 'Tasks',
        ],
        [
            'id' => 'messages',
            'icon' => 'uil uil-envelope-alt',
            'text' => 'Messages',
        ],
    ],
])

<div class="card mb-0">
    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
        @foreach ($p as $item)
            @if ($loop->index < 1)
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#{{ $item['id'] }}" role="tab">
                        <i class="{{ $item['icon'] }} font-size-16 my-2"></i>
                        <span class="d-none d-sm-block">{{ $item['text'] }}</span>
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#{{ $item['id'] }}" role="tab">
                        <i class="{{ $item['icon'] }} font-size-16 my-2"></i>
                        <span class="d-none d-sm-block">{{ $item['text'] }}</span>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>

    <div class="tab-content p-4">
        {{-- <div class="tab-pane active" id="profile" role="tabpanel">
            &nbsp;
        </div> --}}
        {{ $slot }}
    </div>
</div>

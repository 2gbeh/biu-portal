@props([
    'p' => [
        'photo' => 'sryles.png',
        'name' => 'Simon Ryles',
        'title' => 'Full Stack Developer',
        'links' => [
            [
                'href' => '#!',
                'icon' => 'uil uil-user',
                'text' => 'Profile',
            ],
            [
                'href' => '#!',
                'icon' => 'uil uil-envelope-alt',
                'text' => 'Message',
            ],
        ],
    ],
])

<div class="col-xl-3 col-sm-6">
    <div class="card text-center">
        <div class="card-body">
            {{-- <div class="dropdown float-end">
                <a class="text-body dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true">
                    <i class="uil uil-ellipsis-h"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Remove</a>
                </div>
            </div> --}}
            <div class="clearfix"></div>

            @if (isset($p['photo']))
                <div class="mb-4">
                    <img src="{{ asset('images/avatar.png') }}" alt=""
                        class="avatar-lg rounded-circle img-thumbnail">
                </div>
            @else
                <div class="avatar-lg mx-auto mb-4">
                    <div class="avatar-title bg-soft-primary rounded-circle text-primary">
                        <i class="mdi mdi-account-circle display-4 m-0 text-primary"></i>
                    </div>
                </div>
            @endif

            <h5 class="font-size-16 mb-1">
                <a href="#" class="text-dark">
                    {{ $p['name'] }}
                </a>
            </h5>
            <p class="text-muted mb-2">
                {{ $p['title'] }}
            </p>

        </div>

        @isset($p['links'])
            <div class="btn-group" role="group">
                @foreach ($p['links'] as $link)
                    <a href="{{}$p['href']}}" target="_new" class="btn btn-outline-light text-truncate">
                        <i class="{{ $link['icon'] }} me-1"></i>
                        {{ $link['text'] }}
                    </a>
                @endforeach
            </div>
        @endisset
    </div>
</div>

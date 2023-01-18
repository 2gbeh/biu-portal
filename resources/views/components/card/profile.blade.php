@props([
    'p' => (object) [
        'menu' => [
            'Upload Photo' => '#!',
            'Deactivate' => '#!',
        ],
        'avatar' => null,
        'title' => 'John Doe',
        'subtitle' => '<a href="mailto:jdoe@email.com">jdoe@email.com</a>',
        'action' => [
            [
                'href' => '#!',
                'class' => 'bg-success text-white',
                'icon' => 'fas fa-user-edit',
                'text' => 'Edit Profile',
            ],
            [
                'href' => '#!',
                'class' => 'bg-info text-white',
                'icon' => 'fas fa-user-lock',
                'text' => 'Change Password',
            ],
        ],
        'list' => [
            'Phone' => '+2348169960927',
            'Address' => 'UK',
            'Joined' => '1992-09-15 15:00:00',
        ],
    ],
])

<div class="col-xl-4">
    <div class="card h-100">
        <div class="card-body">
            <div class="text-center">

                @isset($p->menu)
                    <div class="dropdown float-end">
                        <a class="text-body dropdown-toggle font-size-18" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true">
                            <i class="fas fa-caret-down"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end">
                            @foreach ($p->menu as $text => $href)
                                <a class="dropdown-item" href="{{ url($href) }}">
                                    {!! $text !!}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endisset

                <div class="clearfix"></div>
                <div>
                    <img src="{{ asset($p->avatar ?? 'images/avatar.png') }}" alt=""
                        class="avatar-lg rounded-circle img-thumbnail" />
                </div>

                <h5 class="mt-3 mb-1">{!! $p->title !!}</h5>

                <p class="font-size-15">{!! $p->subtitle !!}</p>

                <div class="mt-4">
                    @foreach ($p->action as $item)
                        <a href="{{ $item['href'] }}" class="btn btn-sm px-2 py-1 {{ $item['class'] }}">
                            <i class="{{ $item['icon'] }} me-1"></i>
                            {!! $item['text'] !!}
                        </a> &nbsp;
                    @endforeach
                </div>
            </div>

            <hr class="my-4">

            <div class="text-muted">
                <div class="table-responsive mt-4">
                    @foreach ($p->list as $name => $value)
                        <div class="mb-2">
                            <h5 class="mb-1 font-size-14 fw-bol">{!! $name !!}</h5>
                            <p class="font-size-160">{!! $value !!}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

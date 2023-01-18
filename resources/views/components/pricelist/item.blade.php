@props([
    'p' => [
        'title' => 'Starter',
        'subtitle' => 'Starter plans',
        'icon' => 'fi fi-rs-cube',
        'list' => [
            'Users' => 1,
            'Storage' => '1 GB',
            'Domain' => '<b class="text-danger">No</b>',
            'Support' => '<b class="text-danger">No</b>',
            'Setup' => '<b class="text-danger">No</b>',
        ],
        'price' => '<sup>$</sup> 
                    <h1 style="display:inline-block;">19</h1> 
                    <small>/ Per month</small>',
        'link' => ['href' => '#!', 'text' => 'Sign up now'],
    ],
])

<div class="col-xl-{{ $p['col'] ?? '4' }}">
    <div class="card pricing-box text-center">
        <div class="card-body p-4">
            <div>
                <div class="mt-3">
                    <h5 class="mb-1">
                        {!! $p['title'] !!}
                    </h5>

                    <p class="text-muted font-size-15 mt-2">
                        {!! $p['subtitle'] !!}
                    </p>
                </div>

                @isset($p['icon'])
                    <div class="pt-2">
                        @if (is_array($p['icon']))
                            <i class="{{ $p['icon']['i'] }} h3 text-{{ $p['icon']['color'] }}"></i>
                        @else
                            <i class="{{ $p['icon'] }} h3 text-danger"></i>
                        @endif
                    </div>
                @endisset
            </div>

            <ul class="list-unstyled plan-features mt-2">
                @foreach ($p['list'] as $key => $value)
                    <li>
                        <span class="text-unmuted font-size-15">{!! $key !!} </span>
                        <h5 class="text-primary mt-1 mb-0">
                            {!! $value !!}
                        </h5>
                    </li>
                @endforeach
            </ul>

            @isset($p['price'])
                <div class="pb-3">
                    {!! $p['price'] !!}
                </div>
            @endisset

            <div class="text-center plan-btn my-2">
                <a href="{{ url($p['link']['href']) }}" target="{{ $p['link']['target'] ?? '' }}"
                    class="btn btn-{{ $p['link']['color'] ?? 'success' }} waves-effect waves-light fw-bold font-size-12">
                    {!! $p['link']['text'] !!}
                </a>
            </div>
        </div>
    </div>
</div>

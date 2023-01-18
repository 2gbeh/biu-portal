@aware([
    'p' => (object) [
        'button' => ['href' => '', 'color' => 'primary', 'icon' => 'mdi mdi-sync', 'text' => 'Refresh', 'event' => null],
        'input' => ['action' => 'logs.store', 'name' => 'k', 'datalist' => ['John', 'Jane']],
    ],
])

<div class="row mb-2">
    <div class="col-md-6">
        <div class="mb-3">
            @isset($p->button)
                <a href="{{ url($p->button['href']) ?? 'javascript:void(0);' }}" onclick="{{ $p->button['event'] ?? 'javacript:void(0);' }}"
                    class="btn btn-{{ $p->button['color'] ?? 'primary' }} waves-effect waves-light">
                    <i class="{{ $p->button['icon'] ?? 'mdi mdi-plus' }} me-2 font-size-12"></i>
                    <span style="margin-left:-5px;">{{ $p->button['text'] ?? 'Add New' }}</span>
                </a>
            @endisset
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-inline float-md-end mb-3">
            <div class="search-box ms-2">
                <div class="position-relative">
                    @isset($p->input)
                        <form method="GET" action="" autocomplete="off">
                            {{-- <form method="GET" action="{{ route($p->input['action'] }}" autocomplete="off"> --}}
                            @csrf
                            <input type="search" class="form-control rounded bg-light border-0"
                                name="{{ $p->input['name'] }}" value="{{ old($p->input['name']) }}"
                                placeholder="Search ( / )" list="dl-{{ $p->input['name'] }}"
                                {{ $p->input['disabled'] ?? 'required' }} />

                            <i class="mdi mdi-magnify search-icon"></i>

                            @isset($p->input['datalist'])
                                <datalist id="dl-{{ $p->input['name'] }}">
                                    @foreach ($p->input['datalist'] as $option)
                                        <option value="{{ $option }}">
                                    @endforeach
                                </datalist>
                            @endisset
                        </form>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>

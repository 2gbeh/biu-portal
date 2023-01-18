@props([
    'p' => (object) [
        'title' => 'Server Variables',
        'caption' => 'Showing rows 0 - 24 (~25 total), query took 0.0058 secs. ',
        'editable' => true,
        'numbered' => true,
        'paginated' => 10,
        'iter' => 1,
        'thead' => ['#', 'Name', 'Aage', 'Sex', ''],
        'tbody' => [
            [
                'name' => 'John Doe',
                'age' => 30,
                'sex' => 'M',
                'id' => 1,
            ],
            [
                'name' => 'Jane Doe',
                'age' => 27,
                'sex' => 'F',
                'id' => 2,
            ],
        ],
    ],
])

<div class="card">
    <div class="card-body">
        @if (isset($p->title) && isset($p->caption))
            <h4 class="card-title">{{ $p->title }}</h4>
            <p class="card-title-desc">{{ $p->caption }} </p>
        @endif

        <div class="table-responsive">
            <table class="table table-editable table-nowrap align-middle table-edits">
                @isset($p->thead)
                    <thead>
                        <tr>
                            @foreach ($p->thead as $th)
                                <th>{!! $th !!}</th>
                            @endforeach
                            @if ($p->editable)
                                <th></th>
                            @endif
                        </tr>
                    </thead>
                @endisset

                @isset($p->tbody)
                    <tbody>
                        @forelse ($p->tbody as $i => $td)
                            <tr data-id="{{ $i }}">
                                @isset($p->numbered)
                                    @if ($p->paginated > 0)
                                        <td style="width: 10px">{{ $p->iter }}</td>
                                        @php $p->iter+= 1; @endphp
                                    @else
                                        <td style="width: 10px">{{ $loop->iteration }}</td>
                                    @endif
                                @endisset

                                @foreach ($td as $name => $value)
                                    @if ($name !== 'id')
                                        <td data-field="{{ $name }}">{{ $value }}</td>
                                    @else
                                        <td data-field="{{ $name }}" style="visibility:hidden;">{{ $value }}
                                        </td>
                                    @endif
                                @endforeach

                                @if ($p->editable)
                                    <td style="width: 100px">
                                        <a class="btn btn-outline-primary btn-sm edit" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <x-table.empty />
                        @endforelse
                    </tbody>
                @endisset
            </table>
        </div>

        @isset($p->pager)
            <x-table.pager :p="$p" />
        @endisset

    </div>
</div>

@push('scripts_')
    <script src="{{ asset('assets/minible/libs/table-edits/build/table-edits.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/minible/js/pages/table-editable-int.js') }}"></script> --}}
    <script type="text/javascript">
        $(function() {
            var e = {};
            $(".table-edits tr").editable({
                dropdowns: {
                    gender: ["Male", "Female"]
                },
                edit: function(t) {
                    $(".edit i", this)
                        .removeClass("fa-pencil-alt")
                        .addClass("fa-save")
                        .attr("title", "Save");
                },
                save: function(t) {
                    console.log(t);
                    $(".edit i", this)
                        .removeClass("fa-save")
                        .addClass("fa-pencil-alt")
                        .attr("title", "Edit"),
                        this in e && (e[this].destroy(), delete e[this]);
                },
                cancel: function(t) {
                    $(".edit i", this)
                        .removeClass("fa-save")
                        .addClass("fa-pencil-alt")
                        .attr("title", "Edit"),
                        this in e && (e[this].destroy(), delete e[this]);
                },
            });
        });
    </script>
@endpush

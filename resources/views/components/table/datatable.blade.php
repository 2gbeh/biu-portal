@props([
    'p' => (object) [
        'thead' => ['#', 'Name', 'Position', 'Office', 'Age', 'Start Date', 'Salary', 'Action'],
        'pager' => [],
    ],
])


@push('styles')
    <link href="{{ asset('assets/minible/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/minible/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/minible/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
@endpush

@push('scripts_')
    <!-- Required datatable js -->
    <script src="{{ asset('assets/minible/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/minible/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/minible/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/minible/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ asset('assets/minible/js/pages/datatables.init.js') }}"></script>
@endpush

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                        <tr>
                            @foreach ($p->thead as $th)
                                <th>{!! $th !!}</th>
                            @endforeach
                        </tr>
                        </tr>
                    </thead>

                    <tbody>
                        {{ $slot }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

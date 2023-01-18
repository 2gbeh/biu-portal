@props([
    'p' => (object) [
        'thead' => ['#', 'Avatar', 'Name', 'Job Title', 'Email Address'],
    ],
])

@push('styles')
    <link href="{{ asset('assets/minible/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/minible/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
@endpush

@push('scripts_')
    <!-- Required datatable js -->
    <script src="{{ asset('assets/minible/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/minible/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('assets/minible/js/pages/ecommerce-datatables.init.js') }}"></script>
@endpush

<div class="col-lg-12">
    <div class="table-responsive mb-4">
        <table class="table table-centered datatable dt-responsive nowrap table-card-list"
            style="border-collapse: collapse; border-spacing: 0 12px; width: 100%;">
            <thead>
                <tr>
                    {{-- <th style="width: 10px;">
                        <div class="form-check text-center font-size-16">
                            <input type="checkbox" class="form-check-input" id="invoicecheck">
                            <label class="form-check-label" for="invoicecheck"></label>
                        </div>
                    </th> --}}
                    @foreach ($p->thead as $th)
                        <th>{!! $th !!}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                {{ $slot }}
                {{-- <tr>
                    <td>
                        <div class="form-check text-center font-size-16">
                            <input type="checkbox" class="form-check-input" id="invoicecheck1">
                            <label class="form-check-label" for="invoicecheck1"></label>
                        </div>
                    </td>

                    <td><a href="javascript: void(0);" class="text-dark fw-bold">#MN0131</a> </td>
                    <td>
                        10 Jul, 2020
                    </td>
                    <td>Connie Franco</td>

                    <td>
                        $141
                    </td>
                    <td>
                        <div class="badge bg-soft-success font-size-12">Paid</div>
                    </td>
                    <td>
                        <div>
                            <button class="btn btn-light btn-sm w-xs">Pdf <i
                                    class="uil uil-download-alt ms-2"></i></button>
                        </div>
                    </td>

                    <td>
                        <a href="javascript:void(0);" class="px-3 text-primary"><i
                                class="uil uil-pen font-size-18"></i></a>
                        <a href="javascript:void(0);" class="px-3 text-danger"><i
                                class="uil uil-trash-alt font-size-18"></i></a>
                    </td>
                </tr> --}}
            </tbody>
        </table>
    </div>

    {{-- <x-table.pager :p="$p" /> --}}
</div>

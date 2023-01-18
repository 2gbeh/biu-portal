@props([
    'p' => (object) [
        'button' => ['href' => '', 'color' => 'primary', 'icon' => 'mdi mdi-sync', 'text' => 'Refresh'],
        'input' => ['action' => 'logs.store', 'name' => 'k', 'datalist' => ['John', 'Jane']],
        'thead' => ['#', 'Avatar', 'Name', 'Job Title', 'Email Address'],
    ],
    'x' => null,
])

<div class="col-lg-12">

    @includeWhen(!isset($x['card-body']), 'shared.div')

    <x-table.toolbar :p="$p" />

    <!-- end row -->
    <div class="table-responsive mb-4">
        <table class="table table-centered table-nowrap mb-0">
            <thead>
                <tr>
                    @foreach ($p->thead as $th)
                        <th scope="col">{!! $th !!}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                {{ $slot }}
            </tbody>
        </table>
    </div>

    <x-table.pager :p="$p" />

    @includeWhen(!isset($x['card-body']), 'shared.div', ['div' => 2])

</div>

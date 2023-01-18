@props([
    'p' => (object) [
        'pager' => ['insight' => [], 'links' => []],
    ],
])

<div class="row mt-4">
    <div class="col-sm-6">
        <div>
            <p class="mb-sm-0">
                {{ $p->pager->insight }}
            </p>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="float-sm-end">
            {{ $p->pager->links }}
        </div>
    </div>
</div>

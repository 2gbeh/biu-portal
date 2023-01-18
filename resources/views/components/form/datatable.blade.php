@props([
    'p' => [],
    'id' => 'form-host',
    'action' => 'dashboard',
    'method' => 'POST',
    'autocomplete' => 'off',
])

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <x-form.host>
                    <x-form.items :p="$p" />
                    <x-form.buttons :p="['clear', 'save']" />
                </x-form.host>
            </div>
        </div>
    </div>
</div>

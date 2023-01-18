@props([
    'p' => [
        'col' => 4,
        'type' => 'search',
        'label' => 'Username',
        'name' => 'username',
        'placeholder' => 'Enter username',
        'datalist' => $_SERVER,
        'constraint' => 'required', // autofocus|required|readonly|disabled|multiple
    ],
])

@php
$setDefaults = function (array $item) {
    $b = '<b class="text-danger">*</b> ';

    if (isset($item['label'])) {
        $item['label'] = $item['label'][0] == '*' ? $b . substr($item['label'], 1) : $item['label'];
    }
    $item['col'] = isset($item['col']) ? 'col-md-' . $item['col'] : 'col-lg-12';
    $item['type'] = $item['type'] ?? 'text';
    $item['id'] = $item['id'] ?? $item['name'];
    $item['value'] = $item['value'] ?? old($item['name']);
    $item['placeholder_'] = $item['type'] == 'select' && isset($item['placeholder']) ? $item['placeholder'] : '-- select --';
    $item['placeholder'] = $item['placeholder'] ?? '';
    $item['constraint'] = $item['constraint'] ?? '';
    $item['accept'] = $item['accept'] ?? '*.*';
    $item['min'] = $item['min'] ?? 0;
    $item['max'] = $item['max'] ?? null;
    $item['step'] = $item['step'] ?? 1;
    $item['rows'] = $item['rows'] ?? 4;

    return $item;
};

$isMultiple = function (array $item) {
    return strpos($item['constraint'], 'multiple') !== false;
};

$isSelected = function (string $value, string $selected = null) {
    return $value == $selected ? 'selected="selected"' : '';
};

$item = $setDefaults($p);
@endphp

<div class="{{ $item['col'] }}">
    <div class="mb-3">
        @isset($item['label'])
            @if (!in_array($item['type'], ['checkbox', 'radio']))
                <label class="form-label control-label" for="{{ $item['id'] }}">
                    {!! $item['label'] !!}
                </label>
            @endif
        @endisset

        @switch($item['type'])
            @case('checkbox')
                <input class="form-check-input" type="checkbox" id="{{ $item['id'] }}" name="{{ $item['name'] }}"
                    value="{{ $value }}" {{ $item['constraint'] }} /> &nbsp;

                <label class="form-check-label fw-normal" for="{{ $item['id'] }}">
                    {!! $item['label'] !!}
                </label>
            @break

            @case('radio')
                <input class="form-check-input" type="radio" id="{{ $item['id'] }}" name="{{ $item['name'] }}"
                    {{ $item['constraint'] }} /> &nbsp;

                <label class="form-check-label fw-normal" for="{{ $item['id'] }}">
                    value="{{ $value }}" {!! $item['label'] !!}
                </label>
            @break

            @case('file')
                <input class="form-control" type="file" id="{{ $item['id'] }}" name="{{ $item['name'] }}"
                    accept="{{ $item['accept'] }}" {{ $item['constraint'] }} />
            @break

            @case('select')
                <select @class([
                    'form-select form-control select2',
                    'select2-multiple' => $isMultiple($item),
                ]) id="{{ $item['id'] ?? $item['name'] }}" name="{{ $item['name'] }}"
                    {{ $item['constraint'] }}>

                    <option value="" disabled selected hidden>{{ $item['placeholder_'] }}</option>

                    @foreach ($item['options'] as $value => $text)
                        @if (!is_null($text))
                            <option value="{{ $value }}" {{ $isSelected($value, $item['value']) }}>
                                {{ $text }}
                            </option>
                        @endif
                    @endforeach
                </select>
            @break

            @case('textarea')
                <textarea class="form-control" id="{{ $item['id'] }}" name="{{ $item['name'] }}"
                    placeholder="{{ $item['placeholder'] }}" rows="{{ $item['rows'] }}" {{ $item['constraint'] }}>{{ $item['value'] }}</textarea>
            @break

            @default
                @if (isset($item['datalist']))
                    <input class="form-control" type="{{ $item['type'] }}" id="{{ $item['id'] }}"
                        name="{{ $item['name'] }}" value="{{ $item['value'] }}" placeholder="{{ $item['placeholder'] }}"
                        list="dl-{{ $item['name'] }}" {{ $item['constraint'] }} />

                    <datalist id="dl-{{ $item['name'] }}">
                        @foreach ($item['datalist'] as $value)
                            @if (!is_null($value))
                                <option value="{{ $value }}">
                            @endif
                        @endforeach
                    </datalist>
                @else
                    <input class="form-control" type="{{ $item['type'] }}" id="{{ $item['id'] }}"
                        name="{{ $item['name'] }}" value="{{ $item['value'] }}" placeholder="{{ $item['placeholder'] }}"
                        min="{{ $item['min'] }}" max="{{ $item['max'] }}" step="{{ $item['step'] }}"
                        {{ $item['constraint'] }} />
                @endif
        @endswitch
    </div>
</div>

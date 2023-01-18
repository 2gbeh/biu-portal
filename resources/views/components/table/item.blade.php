@props([
    'p' => (object) [
        'item' => 'action-td',
        'data' => [['href' => '#!'], ['href' => '#!']],
    ],
])

@php
$p = is_array($p) ? (object) $p : $p;
@endphp

@switch($p->item)
    @case('image')
        <td>
            <img src="{{ asset($p->data ?? 'images/avatar.png') }}" alt="" class="avatar-xs rounded-circle me-2">
        </td>
    @break

    @case('avatar')
        <td>
            <div class="avatar-xs d-inline-block me-2">
                <div class="avatar-title bg-soft-primary rounded-circle text-primary">
                    <i class="mdi mdi-account-circle m-0"></i>
                </div>
            </div>
        </td>
    @break

    @case('email')
        @php
            $p->data_f = strpos($p->data, '@') != false && strpos($p->data, '.') != false ? 'mailto:' . strtolower($p->data) : '#!';
        @endphp
        <td>
            <a href="{{ $p->data_f }}" target="_new" title="Email">
                {!! strtolower($p->data) !!}
            </a>
        </td>
    @break

    @case('tel')
        @php
            $p->data_f = str_replace(' ', '', $p->data);
            $p->data_f = str_replace('(', '', $p->data_f);
            $p->data_f = str_replace(')', '', $p->data_f);
        @endphp
        <td>
            <a href="tel:{{ $p->data_f }}" target="_new" title="Tel">
                {!! $p->data !!}
            </a>
        </td>
    @break

    @case('link')
        <td>
            <a href="{{ $p->data }}" target="_new">
                {{ $p->data }}
            </a>
        </td>
    @break

    @case('badge')
        <td>
            <span class="badge bg-soft-{{ $p->data['color'] ?? 'secondary' }} font-size-12" role="button">
                {!! $p->data['text'] ?? $p->data !!}
            </span>
        </td>
    @break

    @case('datetime')
        <td class="text-muted font-size-12">
            {!! date('D, M j, Y <\b\\r> H:i A', strtotime($p->data)) !!}
        </td>
    @break

    @case('checkbox-th')
        <th scope="col" style="width: 50px;">
            <div class="form-check font-size-16">
                <input type="checkbox" class="form-check-input" name="{{ $p->data['name'] }}" id="{{ $p->data['id'] }}" />
            </div>
        </th>
    @break

    @case('checkbox-td')
        <th scope="row">
            <div class="form-check font-size-16">
                <input type="checkbox" class="form-check-input" name="{{ $p->data['name'] }}" id="{{ $p->data['id'] }}" />
            </div>
        </th>
    @break

    @case('knob')
        <td>
            <ul class="list-inline mb-0">
                <li class="list-inline-item">
                    <div class="form-check form-switch form-switch-lg">
                        <input type="checkbox" class="form-check-input" id="customSwitchsizelg" checked />
                        <label class="form-check-label" for="customSwitchsizelg"></label>
                    </div>
                </li>
            </ul>
        </td>
    @break

    @case('switch')
        @php
            $p->id = $p->data['id'] ?? 'square-switch';
            $p->on = $p->data['on'] ?? 'On';
            $p->off = $p->data['off'] ?? 'Off';
            $p->title = "{$p->on} / {$p->off}";
            $p->checked = isset($p->data['checked']) && $p->data['checked'] == true ? 'checked' : '';
        @endphp

        <td>
            <ul class="list-inline mb-0">
                <li class="list-inline-item">
                    <div class="square-switch" title="{{ $p->title }}">
                        <input type="checkbox" id="{{ $p->id }}" switch="bool" {{ $p->checked }} />
                        <label for="{{ $p->id }}" data-on-label="{{ $p->on }}"
                            data-off-label="{{ $p->off }}"></label>
                    </div>
                </li>
            </ul>
        </td>
    @break

    @case('action-th')
        <th scope="col" style="width: 200px;">{{ $p->data ?? 'Action' }}</th>
    @break

    @case('action-td')
        <td>
            <ul class="list-inline mb-0">
                <li class="list-inline-item" title="Edit">
                    <a href="#!" class="px-2 text-primary">
                        <i class="fas fa-pen-square font-size-14"></i>
                    </a>
                </li>
                <li class="list-inline-item" title="Delete">
                    <a href="#!" class="px-2 text-danger">
                        <i class="fas fa-times-circle font-size-14"></i>
                    </a>
                </li>
            </ul>
        </td>
    @break

    @case('action-td-del')
        <td>
            <ul class="list-inline mb-0">
                <li class="list-inline-item" title="Delete">
                    <a href="#!" class="px-2 text-danger">
                        <i class="fas fa-times-circle font-size-14"></i>
                    </a>
                </li>
            </ul>
        </td>
    @break
    
    @case('action-td-ddl')
        <td>
            <ul class="list-inline mb-0">
                <li class="list-inline-item">
                    <a href="javascript:void(0);" class="px-2 text-primary"><i class="uil uil-pen font-size-18"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript:void(0);" class="px-2 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
                </li>
                <li class="list-inline-item dropdown">
                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true">
                        <i class="uil uil-ellipsis-v"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else
                            here</a>
                    </div>
                </li>
            </ul>
        </td>
    @break

    @default
@endswitch

@props([
    'p' => 1,
])

<td>
    <ul class="list-inline mb-0">
        <li class="list-inline-item" title="Open">
            <a href="{{ url($url::show($p)) }}" class="px-2 text-primary">
                <i class="far fa-folder-open font-size-15"></i>
            </a>
        </li>
    </ul>
</td>

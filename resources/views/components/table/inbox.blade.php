@props([
    'p' => (object) [
        'button' => ['color' => 'danger', 'icon' => 'far fa-trash-alt', 'text' => 'Delete Selected', 'event' => 'handleTableInbox()'],
        'input' => ['action' => 'logs.show', 'name' => 'slug', 'disabled' => 'disabled'],
        'list' => [
            [
                'id' => 1,
                'subject' => 'Peter, me (3)',
                'message' => 'Hello – Trip home from Colombo has been arranged then Jenna will come get me from Stockholm. :p',
                'created_at' => date('Y-m-d  H:i:s'),
            ],
            [
                'id' => 2,
                'subject' => 'me, Susanna (7)',
                'message' => '<span class="badge bg-warning me-2">Social</span> Since you asked... and i\'m inconceivably bored at the train station – Alright thanks. I\'ll have to re-book that somehow, i\'ll get back to you.',
                'created_at' => '2022-05-04 09:00:00',
            ],
        ],
    ],
])

<script type="text/javascript">
    const handleTableInbox = () => {
        if (confirm("Are you sure ?") === true) {
            const form = document.getElementById('form-host');
            const formData = new FormData(form);
            console.dir(formData);
        }
    };
</script>

<div class="card">
    <x-form.host method="DELETE">

        <div class="card-body" role="toolbar">
            <x-table.toolbar :p="$p" />
        </div>

        <ul class="message-list">
            @foreach ($p->list as $item)
                @php
                    if ($loop->index < 1) {
                        $item['status'] = 'unread';
                        $item['color'] = '';
                    } else {
                        $item['status'] = 'read';
                        $item['color'] = 'text-warning';
                    }
                    $item['url'] = $url::show($item['id']);
                @endphp

                <li class="{{ $item['status'] }}">
                    <div class="col-mail col-mail-1">
                        <div class="checkbox-wrapper-mail">
                            <input type="checkbox" id="form-control-{{ $loop->iteration }}" name="ids[]"
                                value="{{ $item['id'] }}" />
                            <label for="form-control-{{ $loop->iteration }}" class="toggle"></label>
                        </div>

                        <a href="{{ url($item['url']) }}" class="title">
                            {!! $f::wrap($item['subject'], 25) !!}
                        </a>

                        <span class="{{ $item['color'] }} far fa-star"></span>
                    </div>
                    <div class="col-mail col-mail-2">
                        <a href="{{ url($item['url']) }}" class="subject">
                            {!! $f::wrap($item['message'], 180) !!}
                        </a>

                        <time class="date">
                            {{ $f::dioxide($item['created_at']) }}
                        </time>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="card-body">
            <x-table.pager :p="$p" />
        </div>
    </x-form.host>
</div>

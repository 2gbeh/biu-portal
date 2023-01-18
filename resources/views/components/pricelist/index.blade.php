@aware([
    'p' => (object) [
        'title' => 'Choose your pricing plan',
        'summary' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo veritatis',
    ],
])

@includeIf('shared.jumbotron', [
    'jumbotron_title' => $p->title,
    'jumbotron_summary' => $p->summary,
])

<div class="row justify-content-center mt-3 mb-5">
    <div class="col-lg-12">
        {{ $slot }}
    </div>
</div>

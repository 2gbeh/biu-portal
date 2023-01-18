@props([
    'p' => (object) [
        'back' => '#!',
        'avatar' => 'images/avatar.png',
        'name' => 'Humberto D. Champion',
        'email' => 'support@domain.com',
        'subject' => "This Week's Top Stories",
        'message' => "<p>Dear Lorem Ipsum,</p>
                    <p>Praesent dui ex, dapibus eget mauris ut, finibus vestibulum enim. Quisque arcu leo, facilisis in
                        fringilla id, luctus in tortor. Nunc vestibulum est quis orci varius viverra. Curabitur dictum
                        volutpat massa vulputate molestie. In at felis ac velit maximus convallis.
                    </p>
                    <p>Sed elementum turpis eu lorem interdum, sed porttitor eros commodo. Nam eu venenatis tortor, id
                        lacinia diam. Sed aliquam in dui et porta. Sed bibendum orci non tincidunt ultrices. Vivamus
                        fringilla, mi lacinia dapibus condimentum, ipsum urna lacinia lacus, vel tincidunt mi nibh sit
                        amet lorem.</p>
                    <p>Sincerly,</p>",
    ],
])

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start mb-4">
                    <div class="flex-shrink-0 me-3">
                        <img class="rounded-circle avatar-sm" src="{{ asset($p->avatar) }}"
                            alt="Generic placeholder image">
                    </div>

                    <div class="flex-grow-1">
                        <h5 class="font-size-14 my-0 mt-2">
                            {!! $p->name !!}
                        </h5>

                        <small class="text-muted">
                            {!! $p->email !!}
                        </small>
                    </div>
                </div>

                <h4 class="font-size-16">
                    {!! $p->subject !!}
                </h4>

                {!! $p->message !!}

                <hr />

                <a href="{{ url($p->back) }}" class="btn btn-secondary waves-effect mt-4">
                    <i class="fas fa-reply me-2"></i>
                    Back
                </a>
            </div>
        </div>
    </div>
</div>

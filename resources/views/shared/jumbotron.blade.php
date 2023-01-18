@php
$jumbotron_title = $jumbotron_title ?? 'Admission/Application Form';
$jumbotron_summary =
    $jumbotron_summary ??
    "If you are offered admission into the University, a guarantor's form will be sworn to by your parent(s),
    guardian or sponosr stating that fees will be paid as at when due. <br />
    Your application will not be completely proccessed until the guarantor's form is duly signed and return
    to the Institution.";
@endphp

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="text-center">
            <h4>
                {!! $jumbotron_title !!}
            </h4>

            <p class="text-muted mb-4">
                {!! $jumbotron_summary !!}
            </p>
        </div>
    </div>
</div>

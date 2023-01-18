@php
$footer_lt = $footer_lt ?? '&copy 2017 HWP Labs. CRBN 658815';
$footer_rt = $footer_rt ?? '.:: 127.0.0.1';
@endphp

<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                {!! $footer_lt !!}
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-sm-block address">
                    {!! $footer_rt !!}
                </div>
            </div>
        </div>
    </div>
</footer>

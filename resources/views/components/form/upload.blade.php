@props([
    'action' => 'dashboard',
    'input' => [
        'type' => 'file',
        'name' => 'photo',
        'accept' => 'image/*',
        'constraint' => 'required',
    ],
])

@push('styles')
    <link href="{{ asset('assets/minible/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts_')
    <script src="{{ asset('assets/minible/libs/dropzone/min/dropzone.min.js') }}"></script>
@endpush

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">
                    File upload
                </h4>
                <p class="card-title-desc">
                    Maximum file size allowed for upload: 500 MB
                </p>

                <x-form.host :action="$action" class="dropzone">
                    <div>
                        <div class="fallback">
                            <x-form.control :p="$input" />
                        </div>

                        <div class="dz-message needsclick">
                            <div class="mb-3">
                                <i class="display-4 text-muted fas fa-upload"></i>
                            </div>
                            <h4>Drag and drop files here to begin upload..</h4>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success waves-effect waves-light">
                            <i class="fas fa-save me-1"></i>
                            Upload
                        </button>
                    </div>
                </x-form.host>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

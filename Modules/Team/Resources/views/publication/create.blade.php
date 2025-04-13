@extends('setting::layouts.master')

@section('title', 'Create Publication')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('publications.index') }}">Publications</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <form id="product-form" action="{{ route('publications.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <button class="btn btn-primary">Create <i class="bi bi-check"></i></button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{old('name')}}" required>
                                        @error('name')
                                        <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="file">Attachment File</label>
                                        <input type="file" id='file' name="file" class="form-control" placeholder="Enter file" value="{{old('file')}}" required>
                                        @error('file')
                                        <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea type="text" name="description" class="summernote" placeholder="Enter Description" >{{old('description')}}</textarea>
                                        @error('description')
                                        <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="image">Image (469×189)</label>
                                                <p class="text-muted small mb-2">
                                                    <strong>Required size:</strong> Exactly 469×189 pixels<br>
                                                    <strong>Max file size:</strong> 2MB<br>
                                                    <strong>Formats:</strong> JPG, PNG, WEBP<br>
                                                    <strong>Note:</strong> Images not matching exact dimensions will be automatically cropped
                                                </p>

                                                <input type="file" id="file-ip-1" accept="image/*"
                                                    class="form-control-file border" value="{{ old('image') }}"
                                                    onchange="showPreview469(event); validateImage469(this);" name="image">

                                                @error('image')
                                                    <p class="text-danger small">{{ $message }}</p>
                                                @enderror

                                                <div class="preview mt-3 text-center">
                                                    <img src="" id="file-ip-1-preview" class="img-fluid"
                                                        style="max-width: 100%; height: 150px; display: none; object-fit: contain; border: 1px solid #ddd;">
                                                    <div id="size-error-469" class="text-danger small mt-2" style="display: none;"></div>
                                                    <div id="dimension-display-469" class="text-muted small mt-1" style="display: none;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    function showPreview469(event) {
                                        const file = event.target.files[0];
                                        if (file) {
                                            const reader = new FileReader();
                                            reader.onload = function (e) {
                                                const preview = document.getElementById('file-ip-1-preview');
                                                preview.src = e.target.result;
                                                preview.style.display = 'block';
                                            }
                                            reader.readAsDataURL(file);
                                        }
                                    }

                                    function validateImage469(input) {
                                        const sizeError = document.getElementById('size-error-469');
                                        const dimensionDisplay = document.getElementById('dimension-display-469');
                                        sizeError.style.display = 'none';
                                        dimensionDisplay.style.display = 'none';

                                        if (input.files && input.files[0]) {
                                            const file = input.files[0];
                                            const img = new Image();
                                            const reader = new FileReader();

                                            reader.onload = function (e) {
                                                img.src = e.target.result;
                                                img.onload = function () {
                                                    dimensionDisplay.textContent = `Uploaded image: ${this.width}×${this.height} pixels`;
                                                    dimensionDisplay.style.display = 'block';

                                                    const targetWidth = 469;
                                                    const targetHeight = 189;
                                                    const tolerance = 1;

                                                    if (Math.abs(this.width - targetWidth) > tolerance || Math.abs(this.height - targetHeight) > tolerance) {
                                                        sizeError.innerHTML = `⚠️ Image must be exactly <strong>469×189</strong> pixels.<br>Your image is <strong>${this.width}×${this.height}</strong>.`;
                                                        sizeError.style.display = 'block';
                                                    }

                                                    if (file.size > 2 * 1024 * 1024) {
                                                        sizeError.textContent = 'Error: File size exceeds 2MB limit.';
                                                        sizeError.style.display = 'block';
                                                        input.value = '';
                                                        document.getElementById('file-ip-1-preview').style.display = 'none';
                                                        dimensionDisplay.style.display = 'none';
                                                    }
                                                };
                                            };
                                            reader.readAsDataURL(file);
                                        }
                                    }
                                </script>

                                <style>
                                    .preview img {
                                        border-radius: 4px;
                                        padding: 5px;
                                        background-color: #f8f9fa;
                                    }

                                    .text-muted.small {
                                        font-size: 0.8rem;
                                        line-height: 1.4;
                                    }

                                    #size-error-469 {
                                        background-color: #fff8e1;
                                        padding: 8px;
                                        border-left: 3px solid #ffc107;
                                        border-radius: 4px;
                                    }

                                    .card {
                                        margin-bottom: 20px;
                                        border: 1px solid rgba(0, 0, 0, .125);
                                    }

                                    .form-control-file {
                                        padding: 8px;
                                        border-radius: 4px;
                                        background: #f8f9fa;
                                    }
                                </style>

                                <div class="col-md-6">
                                    <!-- Bootstrap Switch -->
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">Publish</h3>
                                        </div>
                                        <div class="card-body">
                                            <input type="checkbox" name="status" checked data-bootstrap-switch
                                                data-off-color="danger" data-on-color="success">
                                        </div>
                                    </div>
                                </div>


                                <hr>
                                <div class="col-md-12 text-center" style=" margin-top: 10px;margin-bottom: 10px;">
                                    <button type="submit" class="btn btn-primary">Create <i class="bi bi-check"></i></button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </form>
    </div>
    </section>
</div>

@endsection
@section('script')
    <!-- image preview -->
    <script type="text/javascript">
        function showPreview1(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>

    <script>
        $('textarea.summernote').summernote({
            placeholder: 'Enter  Company Description',
            tabsize: 2,
            height: 100,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ['fullscreen', 'codeview']],
                ['help', ['help']]
            ],
        });
    </script>
    <script>
        $('.extra-fields-customer').click(function() {
            $('.customer_records').clone().appendTo('.customer_records_dynamic');
            $('.customer_records_dynamic .customer_records').addClass('single remove');
            $('.single .extra-fields-customer').remove();
            $('.single').append('<a href="#" class="remove-field btn-remove-customer badge badge-danger">Remove Product</a>');
            $('.customer_records_dynamic > .single').attr("class", "remove");

            $('.customer_records_dynamic input').each(function() {
                var count = 0;
                var fieldname = $(this).attr("name");
                $(this).attr('name', fieldname + count );
                count++;
            });

        });

        $(document).on('click', '.remove-field', function(e) {
            $(this).parent('.remove').remove();
            e.preventDefault();
        });
    </script>
@endsection

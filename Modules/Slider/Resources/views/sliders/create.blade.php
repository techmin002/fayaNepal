@extends('setting::layouts.master')

@section('title', 'Create Slider')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('sliders.index') }}">Sliders</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <form id="product-form" action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button class="btn btn-primary">Create Slider <i class="bi bi-check"></i></button>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" name="title" class="form-control"
                                                    placeholder="Enter Title " value="{{ old('title') }}" required>
                                                @error('title')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="link">Link</label>
                                                <input type="url" name="link" class="form-control"
                                                    placeholder="Enter Link" value="{{ old('link') }}">
                                                @error('link')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="short_description">Short Description</label>
                                        <textarea type="text" name="short_description" class="summernote" placeholder="Enter short_description" >{{old('short_description')}}</textarea>
                                        @error('short_description')
                                        <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea type="text" name="description" class="summernote" placeholder="Enter description" >{{old('description')}}</textarea>
                                        @error('description')
                                        <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="image">Slider Image</label>
                                                <p class="text-muted small mb-2">
                                                    <strong>Required size:</strong> Exactly 1900×798.417 pixels (2.38:1 aspect ratio)<br>
                                                    <strong>Max file size:</strong> 2MB<br>
                                                    <strong>Formats:</strong> JPG, PNG, WEBP<br>
                                                    <strong>Note:</strong> Images not matching exact dimensions will be automatically cropped
                                                </p>

                                                <input type="file" id="slider-file-ip" accept="image/*"
                                                       class="form-control-file border" value="{{ old('image') }}"
                                                       onchange="showSliderPreview(event); validateSliderImage(this);" name="image">

                                                @error('image')
                                                    <p class="text-danger small">{{ $message }}</p>
                                                @enderror

                                                <div class="preview mt-3 text-center">
                                                    <img src="" id="slider-file-ip-preview" class="img-fluid"
                                                         style="max-width: 100%; height: 150px; display: none; object-fit: contain; border: 1px solid #ddd;">
                                                    <div id="slider-size-error" class="text-danger small mt-2" style="display: none;"></div>
                                                    <div id="slider-dimension-display" class="text-muted small mt-1" style="display: none;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    function showSliderPreview(event) {
                                        const file = event.target.files[0];
                                        if (file) {
                                            const reader = new FileReader();
                                            reader.onload = function(e) {
                                                const preview = document.getElementById('slider-file-ip-preview');
                                                preview.src = e.target.result;
                                                preview.style.display = 'block';
                                            }
                                            reader.readAsDataURL(file);
                                        }
                                    }

                                    function validateSliderImage(input) {
                                        const sizeError = document.getElementById('slider-size-error');
                                        const dimensionDisplay = document.getElementById('slider-dimension-display');
                                        sizeError.style.display = 'none';
                                        dimensionDisplay.style.display = 'none';

                                        if (input.files && input.files[0]) {
                                            const file = input.files[0];
                                            const img = new Image();
                                            const reader = new FileReader();

                                            reader.onload = function(e) {
                                                img.src = e.target.result;
                                                img.onload = function() {
                                                    // Display actual dimensions
                                                    dimensionDisplay.textContent = `Uploaded image: ${this.width}×${this.height} pixels`;
                                                    dimensionDisplay.style.display = 'block';

                                                    // Check exact dimensions (1900×798.417)
                                                    const targetWidth = 1900;
                                                    const targetHeight = 798.417;
                                                    const widthTolerance = 1; // 1 pixel tolerance
                                                    const heightTolerance = 0.5; // 0.5 pixel tolerance

                                                    if (Math.abs(this.width - targetWidth) > widthTolerance ||
                                                        Math.abs(this.height - targetHeight) > heightTolerance) {
                                                        sizeError.innerHTML = `⚠️ Image must be exactly <strong>1900×798.417</strong> pixels.<br>
                                                                            Your image is <strong>${this.width}×${this.height}</strong>.`;
                                                        sizeError.style.display = 'block';
                                                    }

                                                    // Check file size (2MB max)
                                                    if (file.size > 2 * 1024 * 1024) {
                                                        sizeError.textContent = 'Error: File size exceeds 2MB limit.';
                                                        sizeError.style.display = 'block';
                                                        input.value = '';
                                                        document.getElementById('slider-file-ip-preview').style.display = 'none';
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

                                    #slider-size-error {
                                        background-color: #fff8e1;
                                        padding: 8px;
                                        border-left: 3px solid #ffc107;
                                    }

                                    .card {
                                        margin-bottom: 20px;
                                        border: 1px solid rgba(0,0,0,.125);
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
                                            <button type="submit" class="btn btn-primary">Create Slider <i
                                                    class="bi bi-check"></i></button>
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
            $('.single').append(
                '<a href="#" class="remove-field btn-remove-customer badge badge-danger">Remove Product</a>');
            $('.customer_records_dynamic > .single').attr("class", "remove");

            $('.customer_records_dynamic input').each(function() {
                var count = 0;
                var fieldname = $(this).attr("name");
                $(this).attr('name', fieldname + count);
                count++;
            });

        });

        $(document).on('click', '.remove-field', function(e) {
            $(this).parent('.remove').remove();
            e.preventDefault();
        });
    </script>
@endsection

@extends('setting::layouts.master')

@section('title', 'Create Event')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Event</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <form id="product-form" action="{{ route('events.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button class="btn btn-info"><i class="fa fa-plus"></i> Create Event <i
                                        class="bi bi-check"></i></button>
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
                                                    placeholder="Enter Title" value="{{ old('title') }}" required>
                                                @error('title')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="location">Location</label>
                                                <input type="text" name="location" class="form-control"
                                                    placeholder="Enter Event Location " value="{{ old('location') }}">
                                                @error('location')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="button_text">Button Text</label>
                                        <input type="text" name="button_text" class="form-control" placeholder="Enter Button Text" value="{{old('button_text')}}" >
                                        @error('button_text')
                                        <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div> --}}

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="shortdescription">Short Description</label>
                                                <textarea name="shortdescription" class="summernote" id="" cols="30" rows="3"></textarea>
                                                @error('shortdescription')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description" class="summernote" id="" cols="30" rows="3"></textarea>
                                                @error('description')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="date">Date</label>
                                                <input type="date" name="date" class="form-control"
                                                    placeholder="Enter Contact " value="{{ old('date') }}">
                                                @error('date')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="image">Image</label>
                                                        <p class="text-muted small mb-2">
                                                            <strong>Required size:</strong> Exactly 834×556 pixels<br>
                                                            <strong>Max file size:</strong> 2MB<br>
                                                            <strong>Formats:</strong> JPG, PNG, WEBP<br>
                                                            <strong>Note:</strong> Images not matching exact dimensions will be automatically cropped
                                                        </p>

                                                        <input type="file" id="file-ip-1" accept="image/*" class="form-control-file border"
                                                            value="{{ old('image') }}" onchange="showPreview1(event); validateImage1(this);" name="image">

                                                        @error('image')
                                                            <p class="text-danger small">{{ $message }}</p>
                                                        @enderror

                                                        <div class="preview mt-3 text-center">
                                                            <img src="" id="file-ip-1-preview" class="img-fluid"
                                                                style="max-width: 100%; height: 150px; display: none; object-fit: contain; border: 1px solid #ddd;">
                                                            <div id="size-error-1" class="text-danger small mt-2" style="display: none;"></div>
                                                            <div id="dimension-display-1" class="text-muted small mt-1" style="display: none;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            function showPreview1(event) {
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

                                            function validateImage1(input) {
                                                const sizeError = document.getElementById('size-error-1');
                                                const dimensionDisplay = document.getElementById('dimension-display-1');
                                                sizeError.style.display = 'none';
                                                dimensionDisplay.style.display = 'none';

                                                if (input.files && input.files[0]) {
                                                    const file = input.files[0];
                                                    const img = new Image();
                                                    const reader = new FileReader();

                                                    reader.onload = function (e) {
                                                        img.src = e.target.result;
                                                        img.onload = function () {
                                                            // Display actual dimensions
                                                            dimensionDisplay.textContent = `Uploaded image: ${this.width}×${this.height} pixels`;
                                                            dimensionDisplay.style.display = 'block';

                                                            // Required size
                                                            const targetWidth = 834;
                                                            const targetHeight = 556;
                                                            const widthTolerance = 1;
                                                            const heightTolerance = 1;

                                                            if (Math.abs(this.width - targetWidth) > widthTolerance ||
                                                                Math.abs(this.height - targetHeight) > heightTolerance) {
                                                                sizeError.innerHTML = `⚠️ Image must be exactly <strong>834×556</strong> pixels.<br>Your image is <strong>${this.width}×${this.height}</strong>.`;
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

                                            #size-error-1 {
                                                background-color: #fff8e1;
                                                padding: 8px;
                                                border-left: 3px solid #ffc107;
                                                border-radius: 4px;
                                                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
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

                                        <div class="col-md-4">
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
                                            <button type="submit" class="btn btn-primary">Create <i
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
            placeholder: '',
            tabsize: 2,
            height: 250,
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

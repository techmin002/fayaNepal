@extends('setting::layouts.master')

@section('title', 'Donors')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
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
        .size-error {
            background-color: #fff8e1;
            padding: 8px;
            border-left: 3px solid #ffc107;
            border-radius: 4px;
        }
        .image-card {
            margin-bottom: 20px;
            border: 1px solid rgba(0, 0, 0, .125);
        }
        .form-control-file {
            padding: 8px;
            border-radius: 4px;
            background: #f8f9fa;
        }
        .img-thumbnail {
            max-width: 100px;
            max-height: 100px;
            object-fit: contain;
            border: 1px solid #ddd;
        }
    </style>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Donors</li>
    </ol>
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title float-right">
                                    <a href="{{ route('donors.index') }}" class="btn btn-primary text-decoration-none">
                                        Donors list
                                    </a>
                                </h3>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('donors.update', $donor->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" value="{{ old('name', $donor->name) }}"
                                                       class="form-control" placeholder="Enter Donor Name" required>
                                                @error('name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="partner_id">Partner</label>
                                                <select name="partner_id" class="form-control" required>
                                                    <option value="" disabled>Select Partner</option>
                                                    @foreach($partners as $partner)
                                                        <option value="{{ $partner->id }}" {{ $donor->partner_id == $partner->id ? 'selected' : '' }}>
                                                            {{ $partner->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('partner_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description" class="form-control"
                                                          placeholder="Enter Description">{{ old('description', $donor->description) }}</textarea>
                                                @error('description')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card image-card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="image">Donor Image</label>
                                                        <p class="text-muted small mb-2">
                                                            <strong>Required size:</strong> Around 150×84 pixels<br>
                                                                            <strong>Max file size:</strong> 2MB<br>
                                                                            <strong>Formats:</strong> JPG, PNG, WEBP<br>
                                                                            <strong>Note:</strong> Images not matching exact dimensions will be automatically cropped
                                                        </p>
                                                        <input type="file" id="edit-image-input" accept="image/*"
                                                               class="form-control-file border" name="image"
                                                               onchange="showPreview(event, 'edit-image-preview'); validateImageSize(this, 'edit-size-error')">
                                                        @error('image')
                                                            <p class="text-danger small">{{ $message }}</p>
                                                        @enderror
                                                        <div class="preview mt-3 text-center">
                                                            <img src="{{ asset('upload/images/donors/' . $donor->image) }}"
                                                            style="height: 100px; width:100px" alt="">
                                                            <div id="edit-size-error" class="size-error" style="display: none;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card card-secondary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Publish</h3>
                                                </div>
                                                <div class="card-body">
                                                    <input type="checkbox" name="status" {{ $donor->status ? 'checked' : '' }}
                                                           data-bootstrap-switch data-off-color="danger"
                                                           data-on-color="success">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update Donor</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('third_party_scripts')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $('#donorsTable').DataTable();

            // Initialize Bootstrap Switch
            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
        });

        // Image Preview Functions
        function showPreview(event, previewId) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const preview = document.getElementById(previewId);
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        }

        function validateImageSize(input, errorId) {
            const sizeError = document.getElementById(errorId);
            sizeError.style.display = 'none';

            if (input.files && input.files[0]) {
                const file = input.files[0];
                if (file.size > 2 * 1024 * 1024) {
                    sizeError.textContent = 'Error: File size exceeds 2MB limit.';
                    sizeError.style.display = 'block';
                    input.value = '';
                    const previewId = input.id + '-preview';
                    document.getElementById(previewId).style.display = 'none';
                }
            }
        }
    </script>
@endsection

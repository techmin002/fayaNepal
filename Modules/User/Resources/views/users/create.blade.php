@extends('setting::layouts.master')

@section('title', 'Create User')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid mb-4">
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button class="btn btn-primary">Create User <i class="bi bi-check"></i></button>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="name">Name <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text" name="name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="email">Email <span class="text-danger">*</span></label>
                                                <input class="form-control" type="email" name="email" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="password">Password <span class="text-danger">*</span></label>
                                                <input class="form-control" type="password" name="password" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="password_confirmation">Confirm Password <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="password" name="password_confirmation"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Role <span class="text-danger">*</span></label>
                                        <select class="form-control" name="role" id="role" required>
                                            <option value="" selected disabled>Select Role</option>
                                            @foreach (\Spatie\Permission\Models\Role::where('name', '!=', 'Super Admin')->get() as $role)
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <select class="form-control" name="status" id="status" required>
                                            <option value="" selected disabled>Select Status</option>
                                            <option value="on">Active</option>
                                            <option value="off">Deactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="image">Profile Image <span class="text-danger">*</span></label>
                                        <p class="text-muted small mb-2">Recommended size: 300x300 pixels (1:1 aspect ratio)<br>
                                        Max file size: 2MB<br>
                                        Formats: JPG, PNG, GIF</p>

                                        <input type="file" id="file-ip-1" accept="image/*"
                                               class="form-control-file border" value="{{ old('image') }}"
                                               onchange="showPreview1(event); validateImage(this);" name="image">

                                        @error('image')
                                            <p class="text-danger small">{{ $message }}</p>
                                        @enderror

                                        <div class="preview mt-3 text-center">
                                            <img src="" id="file-ip-1-preview" class="img-thumbnail"
                                                 style="max-width: 200px; max-height: 200px; display: none;">
                                            <div id="size-error" class="text-danger small mt-2" style="display: none;"></div>
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
                                    reader.onload = function(e) {
                                        const preview = document.getElementById('file-ip-1-preview');
                                        preview.src = e.target.result;
                                        preview.style.display = 'block';
                                    }
                                    reader.readAsDataURL(file);
                                }
                            }

                            function validateImage(input) {
                                const sizeError = document.getElementById('size-error');
                                sizeError.style.display = 'none';

                                if (input.files && input.files[0]) {
                                    const file = input.files[0];
                                    const img = new Image();
                                    const reader = new FileReader();

                                    reader.onload = function(e) {
                                        img.src = e.target.result;
                                        img.onload = function() {
                                            // Check dimensions
                                            if (this.width !== 300 || this.height !== 300) {
                                                sizeError.textContent = `Warning: Image is ${this.width}x${this.height} pixels. Recommended size is 300x300 pixels.`;
                                                sizeError.style.display = 'block';
                                            }

                                            // Check file size (2MB max)
                                            if (file.size > 2 * 1024 * 1024) {
                                                sizeError.textContent = 'Error: File size exceeds 2MB limit.';
                                                sizeError.style.display = 'block';
                                                input.value = ''; // Clear the file input
                                                document.getElementById('file-ip-1-preview').style.display = 'none';
                                            }
                                        };
                                    };
                                    reader.readAsDataURL(file);
                                }
                            }
                        </script>

                        <style>
                            .preview img {
                                border: 1px solid #ddd;
                                border-radius: 4px;
                                padding: 5px;
                                background-color: #f8f9fa;
                            }

                            .img-thumbnail {
                                object-fit: cover;
                            }

                            .text-muted.small {
                                font-size: 0.8rem;
                            }
                        </style>
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
@endsection
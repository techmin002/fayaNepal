@extends('setting::layouts.master')

@section('title', 'Partners')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Partners</li>
    </ol>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title float-right"><a class="btn btn-primary" data-toggle="modal"
                                        data-target="#partnerCreate"><i class="fa fa-plus"></i> Create</a> </h3>
                                <div class="modal fade" id="partnerCreate" tabindex="-1"
                                    aria-labelledby="partnerCreateLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="partnerCreateLabel">Partner Create</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>

                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('partners.store') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="title">Name</label>
                                                                <input type="text" name="title"
                                                                    value="{{ old('title') }}" class="form-control"
                                                                    placeholder="Enter Name" required>
                                                                @error('title')
                                                                    <p style="color: red">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="type">Partner Type</label>
                                                                <select name="type" class="form-control" id="">
                                                                    <option value="" selected disabled>Select Partner
                                                                        Type</option>
                                                                    <option value="current">Current Partner</option>
                                                                    <option value="past">Past Partner</option>
                                                                </select>
                                                                @error('type')
                                                                    <p style="color: red">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="logo">Image</label>
                                                                        <p class="text-muted small mb-2">
                                                                            <strong>Required size:</strong> Around 150×84 pixels<br>
                                                                            <strong>Max file size:</strong> 2MB<br>
                                                                            <strong>Formats:</strong> JPG, PNG, WEBP<br>
                                                                            <strong>Note:</strong> Images not matching exact dimensions will be automatically cropped
                                                                        </p>

                                                                        <input type="file" id="file-ip-1" accept="image/*"
                                                                            class="form-control-file border" value="{{ old('image') }}"
                                                                            onchange="showPreview1(event); validateImage150x84(this);" name="image">

                                                                        @error('image')
                                                                            <p class="text-danger small">{{ $message }}</p>
                                                                        @enderror

                                                                        <div class="preview mt-3 text-center">
                                                                            <img src="" id="file-ip-1-preview" class="img-fluid"
                                                                                style="max-width: 100%; height: 100px; display: none; object-fit: contain; border: 1px solid #ddd;">
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

                                                            function validateImage150x84(input) {
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
                                                                            dimensionDisplay.textContent = `Uploaded image: ${this.width}×${this.height} pixels`;
                                                                            dimensionDisplay.style.display = 'block';

                                                                            const targetWidth = 150;
                                                                            const targetHeight = 84;
                                                                            const tolerance = 1;

                                                                            if (Math.abs(this.width - targetWidth) > tolerance || Math.abs(this.height - targetHeight) > tolerance) {
                                                                                sizeError.innerHTML = `⚠️ Image must be exactly <strong>150×84</strong> pixels.<br>Your image is <strong>${this.width}×${this.height}</strong>.`;
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
                                                                    <input type="checkbox" name="status" checked
                                                                        data-bootstrap-switch data-off-color="danger"
                                                                        data-on-color="success">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($partners as $key => $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->title }}</td>
                                                <td><img src="{{ asset('upload/images/partners/' . $value->logo) }}"
                                                        style="height: 100px; width:100px" alt=""></td>
                                                <td class="text-center">
                                                    @if ($value->status == 'on')
                                                        <a href="{{ route('partner.status', $value->id) }}"
                                                            class="btn btn-success">On</a>
                                                    @else
                                                        <a href="{{ route('partner.status', $value->id) }}"
                                                            class="btn btn-danger">Off</a>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a data-toggle="modal" data-target="#partnerEdit{{ $value->id }}"
                                                        class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                    {{-- <a href="{{ route('partners.show',$value->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a> --}}
                                                    <button id="delete" class="btn btn-danger btn-sm"
                                                        onclick="
                                    event.preventDefault();
                                    if (confirm('Are you sure? It will delete the data permanently!')) {
                                        document.getElementById('destroy{{ $value->id }}').submit()
                                    }
                                    ">
                                                        <i class="fa fa-trash"></i>
                                                        <form id="destroy{{ $value->id }}" class="d-none"
                                                            action="{{ route('partners.destroy', $value->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </button>
                                                    <div class="modal fade" id="partnerEdit{{ $value->id }}" tabindex="-1"
                                                        aria-labelledby="partnerEditLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="partnerEditLabel">Partner
                                                                        Edit</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('partners.update',$value->id) }}"
                                                                        method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="title">Name</label>
                                                                                    <input type="text" name="title"
                                                                                        value="{{ $value->title }}"
                                                                                        class="form-control"
                                                                                        placeholder="Enter Name" required>
                                                                                    @error('title')
                                                                                        <p style="color: red">
                                                                                            {{ $message }}</p>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="type">Partner
                                                                                        Type</label>
                                                                                        <select name="type" class="form-control" id="">
                                                                                            <option value="" disabled>Select Partner Type</option>
                                                                                            <option value="current" {{ old('type', $value->type ?? '') == 'current' ? 'selected' : '' }}>Current</option>
                                                                                            <option value="past" {{ old('type', $value->type ?? '') == 'past' ? 'selected' : '' }}>Past</option>
                                                                                        </select>
                                                                                    @error('type')
                                                                                        <p style="color: red">
                                                                                            {{ $message }}</p>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="logo">Image</label>
                                                                                    <input type="file" id="file-ip-1"
                                                                                        accept="image/*"
                                                                                        class="form-control-file border"
                                                                                        value="{{ old('image') }}"
                                                                                        onchange="showPreview1(event);"
                                                                                        name="image">
                                                                                    @error('image')
                                                                                        <p style="color: red">
                                                                                            {{ $message }}</p>
                                                                                    @enderror
                                                                                    <div class="preview mt-2">
                                                                                        <img src=""
                                                                                            id="file-ip-1-preview"
                                                                                            width="200px">
                                                                                    </div>
                                                                                    <div class="preview mt-2">
                                                                                        <img src="{{ asset('upload/images/partners/'.$value->logo) }}" width="200px">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <!-- Bootstrap Switch -->
                                                                                <div class="card card-secondary">
                                                                                    <div class="card-header">
                                                                                        <h3 class="card-title">Publish</h3>
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        @if($value->status == 'on')
                                                                                        <input type="checkbox" name="status" checked data-bootstrap-switch
                                                                                            data-off-color="danger" data-on-color="success" >
                                                                                    @else
                                                                                        <input type="checkbox" name="status" data-bootstrap-switch
                                                                                        data-off-color="danger" data-on-color="success">
                                                                                    @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Save
                                                                                changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>
                    </div>
                </div>
        </section>
    </div>
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

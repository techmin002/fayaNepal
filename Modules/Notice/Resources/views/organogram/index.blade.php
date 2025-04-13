@extends('setting::layouts.master')

@section('title', 'Organograms')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection


@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                      <h1>Organograms</h1>
                    </div>
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Organograms</li>
                      </ol>
                    </div>
                  </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title float-right"><a class="btn btn-primary" data-toggle="modal"
                                        data-target="#organogramCreate"><i class="fa fa-plus"></i> Create</a> </h3>
                                <div class="modal fade" id="organogramCreate" tabindex="-1"
                                    aria-labelledby="organogramCreateLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="organogramCreateLabel">Organogram Create</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('organograms.store') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="title">Title</label>
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
                                                                <label for="logo">Image <small>(Optional)</small></label>
                                                                <input type="file" id="file-ip-1" accept="image/*"
                                                                       class="form-control-file border"
                                                                       value="{{ old('image') }}"
                                                                       onchange="showPreview1(event);" name="image">
                                                                <small class="form-text text-muted">
                                                                    Recommended size: 1300px (width) × 1554px (height)<br>
                                                                    Image will be automatically cropped to fit this ratio
                                                                </small>
                                                                @error('image')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                                <div class="preview mt-2">
                                                                    <img src="" id="file-ip-1-preview" width="200px">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
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
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($organograms as $key => $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->title }}</td>
                                                <td><a href="{{ asset('upload/images/organograms/' . $value->image) }}"> <img src="{{ asset('upload/images/organograms/' . $value->image) }}"
                                                        style="height: 100px; width:100px" alt=""></a></td>
                                                <td class="text-center">
                                                    @if ($value->status == 'on')
                                                        <a href="{{ route('organogram.status', $value->id) }}"
                                                            class="btn btn-success">On</a>
                                                    @else
                                                        <a href="{{ route('organogram.status', $value->id) }}"
                                                            class="btn btn-danger">Off</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#organogramEdit{{ $value->id }}"
                                                        class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                    {{-- <a href="{{ route('Organograms.show',$value->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a> --}}
                                                    <button id="delete" class="btn btn-danger btn-sm"
                                                        onclick="
                                    event.preventDefault();
                                    if (confirm('Are you sure? It will delete the data permanently!')) {
                                        document.getElementById('destroy{{ $value->id }}').submit()
                                    }
                                    ">
                                                        <i class="fa fa-trash"></i>
                                                        <form id="destroy{{ $value->id }}" class="d-none"
                                                            action="{{ route('organograms.destroy', $value->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </button>
                                                    <div class="modal fade" id="organogramEdit{{ $value->id }}" tabindex="-1"
                                                        aria-labelledby="organogramEditLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="organogramEditLabel">Partner
                                                                        Edit</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('organograms.update',$value->id) }}"
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
                                                                                        <img src="{{ asset('upload/images/organograms/'.$value->image) }}" width="200px">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-12">
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
                                            <th>Title</th>
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

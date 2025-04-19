@extends('setting::layouts.master')

@section('title', 'Donors')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Donors</li>
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
                                <h3 class="card-title float-right">
                                    <a href="{{ route('partners.donors') }}" class="btn btn-primary text-decoration-none">
                                        Paertner-With-Donors
                                    </a>
                                    <a href="{{ route('donors.create') }}" class="btn btn-primary text-decoration-none">
                                        <i class="fa fa-plus"></i>create
                                    </a>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Name</th>
                                            <th>Partner</th>
                                            {{-- <th>Partner Image</th> --}}
                                            <th>Donor Image</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($donors as $key => $donor)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $donor->name }}</td>
                                                <td>{{ $donor->partner->title ?? 'N/A' }}</td>
                                                <td>
                                                    <img src="{{ asset('upload/images/donors/' . $donor->image) }}"
                                                        style="height: 100px; width:100px" alt="">
                                                </td>
                                                {{-- <td>
                                                    <img src="{{ asset('upload/images/donors/' . $donor->donorimage) }}"
                                                        style="height: 100px; width:100px" alt="">
                                                </td> --}}
                                                <td class="text-center">
                                                    @if ($donor->status == 'on')
                                                        <a href="{{ route('donors.status', $donor->id) }}"
                                                            class="btn btn-success">Active</a>
                                                    @else
                                                        <a href="{{ route('donors.status', $donor->id) }}"
                                                            class="btn btn-danger">Inactive</a>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('donors.edit',$donor->id) }}" class="btn btn-primary text-decoration-none">  <i class="fa fa-edit"></i></a>


                                                    <button id="delete" class="btn btn-danger btn-sm"
                                                        onclick="
                                        event.preventDefault();
                                        if (confirm('Are you sure? It will delete the data permanently!')) {
                                            document.getElementById('destroy{{ $donor->id }}').submit()
                                        }
                                        ">
                                                        <i class="fa fa-trash"></i>
                                                        <form id="destroy{{ $donor->id }}" class="d-none"
                                                            action="{{ route('donors.destroy', $donor->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </button>
                                                    <div class="modal fade" id="donorEdit{{ $donor->id }}" tabindex="-1"
                                                        aria-labelledby="donorEditLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="donorEditLabel">Edit Donor</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
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
                                            <th>Partner</th>
                                            <th>Donor Image</th>
                                            {{-- <th>Donor Image</th> --}}
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
        function showDonorPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("donor-image-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        function showDonorEditPreview(event, id) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("donor-image-edit-preview-" + id);
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
@endsection

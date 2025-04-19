@extends('setting::layouts.master')

@section('title', 'Donors')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Donors and partners</li>
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
                                    <a href="{{ route('donors.index') }}" class="btn btn-primary text-decoration-none">
                                        <i class="fa fa-arrow-left"></i> Back
                                    </a>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th colspan="2">Partner</th>
                                            {{-- <th>Partner Logo</th> --}}
                                            <th>Donors</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($partners as $index => $partner)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $partner->title }}</td>
                                                <td class="text-center">
                                                    <img src="{{ asset('upload/images/partners/' . $partner->logo) }}"
                                                        alt="{{ $partner->name }}"
                                                        class="img-thumbnail"
                                                        style="height: 100px; width:100px; object-fit: contain;">
                                                </td>
                                                <td>
                                                    @foreach($partner->donors as $donor)
                                                        <img src="{{ asset('upload/images/donors/' . $donor->image) }}"
                                                            alt="{{ $donor->name }}"
                                                            class="img-thumbnail mr-2 mb-2"
                                                            style="height: 100px; width:100px; object-fit: contain;">
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S.N</th>
                                            <th colspan="2">Partner</th>
                                            {{-- <th>Partner Logo</th> --}}
                                            <th>Donors</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-muted">
                                {{-- <small><i class="fa fa-info-circle me-1"></i> Last updated: {{ now()->format('M d, Y H:i') }}</small> --}}
                                <small class="float-end">Total Partners: {{ count($partners) }}</small>
                            </div>
                        </div>
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

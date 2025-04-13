@extends('setting::layouts.master')

@section('title', 'Reports')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Reports</li>
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
                              <h3 class="card-title float-right"><a class="btn btn-info text-white" href="{{ route('reports.create') }}"><i class="fa fa-plus"></i> Create</a> </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>S.N</th>
                                  <th>Title</th>
                                  <th class="text-center">Image</th>
                                  <th>Report Type</th>
                                  <th>File</th>
                                  <th>Date</th>
                                  <th class="text-center">Status</th>
                                  <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($reports as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td class="text-center"><img src="{{ asset('upload/images/reports/'.$value->image) }}" width="120px" alt="{{ $value->name }}"> </td>
                                        <td>{{ ucfirst($value->report_type) }}</td>
                                        <td><a href="{{ asset('upload/images/reports/'.$value->file ) }}" tilte="Download File">File</a></td>
                                        <td>{{ $value->created_at }}</td>
                                        <td class="text-center">
                                            @if($value->status == 'on')
                                            <a href="{{ route('report.status',$value->id) }}" class="btn btn-success">On</a>
                                            @else
                                            <a href="{{ route('report.status',$value->id) }}" class="btn btn-danger">Off</a>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('reports.edit',$value->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            {{-- <a href="{{ route('reports.show',$value->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a> --}}
                                            <button id="delete" class="btn btn-danger btn-sm" onclick="
                                            event.preventDefault();
                                            if (confirm('Are you sure? It will delete the data permanently!')) {
                                                document.getElementById('destroy{{ $value->id }}').submit()
                                            }
                                            ">
                                            <i class="fa fa-trash"></i>
                                            <form id="destroy{{ $value->id }}" class="d-none" action="{{ route('reports.destroy', $value->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </button>
                                        </td>
                                      </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>S.N</th>
                                  <th>Title</th>
                                  <th class="text-center">Image</th>
                                  <th>Report Type</th>
                                  <th>File</th>
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
            </div>
        </section>
    </div>
@endsection

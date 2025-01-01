@extends('setting::layouts.master')

@section('title', 'Volunteers Request')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection



@section('content')
    <div class="content-wrapper">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Volunteers Request</li>
        </ol>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                              <h2 class="card-title float-left">Volunteer Request</h2>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>S.N</th>
                                  <th>Name</th>
                                  <th class="text-center">Application Form</th>
                                  <th class="text-center">Status</th>
                                  <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($vollenters as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td class="text-center">
                                            <a href="{{ asset('upload/images/volunteer-form/'.$value->form) }}" target="_blank" class="badge badge-primary"> <i class="fa fa-eye"></i> View From</a>
                                         </td>
                                        
                                        <td class="text-center">
                                            @if($value->status == 'pending')
                                            <a class="badge badge-warning">{{ ucfirst($value->status) }}</a>
                                            @elseif($value->status == 'accept')
                                            <a class="badge badge-success">{{ ucfirst($value->status) }}</a> 
                                            @else
                                            <a class="badge badge-danger">{{ ucfirst($value->status) }}</a> 
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown show">
                                                <a class="badge badge-info dropdown-toggle" href="#"
                                                    role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    {{ ucfirst($value->status) }}
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item"
                                                        href="{{ route('volunteer.status', ['id' => $value->id, 'status' => 'accept']) }}">Accept</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('volunteer.status', ['id' => $value->id, 'status' => 'reject']) }}">Reject</a>

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
                                    <th class="text-center">Application Form</th>
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

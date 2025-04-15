@extends('setting::layouts.master')

@section('title', 'Bank Accounts')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Bank Accounts</li>
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
                              <h3 class="card-title float-right"><a class="btn btn-info text-white" href="{{ route('bank-accounts.create') }}"><i class="fa fa-plus"></i> Create</a> </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>S.N</th>
                                  <th>Bank Name</th>
                                  <th>Bank Branch</th>
                                  <th class="text-center">Account QR</th>
                                  <th>Account Name</th>
                                  <th>Account Number</th>
                                  <th>PhonePay Number</th>
                                  <th class="text-center">Status</th>
                                  <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($bankaccounts as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->bank_name }}</td>
                                        <td>{{ $value->bank_branch }}</td>
                                        <td class="text-center"><img src="{{ asset('upload/images/bank_accounts/'.$value->account_qr) }}" width="120px" alt="{{ $value->name }}"> </td>
                                        <td>{{ $value->account_name }}</td>
                                        <td>{{ $value->account_number }}</td>
                                        <td>{{ $value->mobile_number }}</td>
                                        <td class="text-center">
                                            @if($value->status == 'on')
                                            <a href="{{ route('bank-account.status',$value->id) }}" class="btn btn-success">On</a>
                                            @else
                                            <a href="{{ route('bank-account.status',$value->id) }}" class="btn btn-danger">Off</a>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('bank-accounts.edit',$value->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            {{-- <a href="{{ route('bank-accounts.show',$value->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a> --}}
                                            <button id="delete" class="btn btn-danger btn-sm" onclick="
                                            event.preventDefault();
                                            if (confirm('Are you sure? It will delete the data permanently!')) {
                                                document.getElementById('destroy{{ $value->id }}').submit()
                                            }
                                            ">
                                            <i class="fa fa-trash"></i>
                                            <form id="destroy{{ $value->id }}" class="d-none" action="{{ route('bank-accounts.destroy', $value->id) }}" method="POST">
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
                                    <th>Bank Name</th>
                                    <th>Bank Branch</th>
                                    <th class="text-center">Account QR</th>
                                    <th>Account Name</th>
                                    <th>Account Number</th>
                                    <th>PhonePay Number</th>
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

@extends('setting::layouts.master')

@section('title', 'Donations')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

  

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Donations</li>
        </ol>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                              <h3 class="card-title "><a class="" href=""> Donations</a> </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>S.N</th>
                                  <th>Donor Name</th>
                                  <th>Email</th>
                                  <th class="text-center">Account</th>
                                  <th>Payment Receipt</th>
                                  <th>Message</th>
                                  <th class="text-center">Donation Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($donations as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->amount }}</td>
                                        <td class="text-center"><a href="{{ asset('upload/images/donations/'.$value->receipt) }}" target="_blank" title="View Receipt"><img src="{{ asset('upload/images/donations/'.$value->receipt) }}" width="120px" alt="{{ $value->name }}"> </a></td>
                                        
                                        <td>
                                            <textarea name=""  id="" class="form-control" disabled>{{ $value->message }}</textarea>
                                        </td>
                                        <td class="text-center">
                                            @if($value->status == 'paid')
                                            <a href="{{ route('donation.status',$value->id) }}" class="btn btn-success">Paid</a>
                                            @else
                                            <a href="{{ route('donation.status',$value->id) }}" class="btn btn-danger">Un-paid</a> 
                                            @endif
                                        </td>
                                        {{-- <td class="text-center">
                                            <a href="{{ route('bank-accounts.edit',$value->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
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
                                        </td> --}}
                                      </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                <th>S.N</th>
                                  <th>Donor Name</th>
                                  <th>Email</th>
                                  <th class="text-center">Account</th>
                                  <th>Payment Receipt</th>
                                  <th>Message</th>
                                  <th class="text-center">Donation Status</th>
                                  {{-- <th class="text-center">Action</th> --}}
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

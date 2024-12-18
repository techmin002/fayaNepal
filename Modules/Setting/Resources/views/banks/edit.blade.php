@extends('setting::layouts.master')

@section('title', 'Edit Bank Acccount')



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('bank-accounts.index') }}">Bank Account</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
        <section class="content-header">
            <div class="container-fluid">
               
                    <div class="row">
                       
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <a href="{{ route('bank-accounts.index') }}" class="btn btn-primary">Bank Accounts <i class="bi bi-check"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <form id="product-form" action="{{ route('bank-accounts.update', $bank->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bank_name">Bank Name</label>
                                            <input type="text" name="bank_name" class="form-control" placeholder="Enter Bank Name" value="{{$bank->bank_name}}" required>
                                            @error('bank_name')
                                            <p style="color: red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="branch_name">Branch Name</label>
                                            <input type="text" name="branch_name" class="form-control" placeholder="Enter Branch Name" value="{{$bank->bank_branch}}" >
                                            @error('branch_name')
                                            <p style="color: red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account_name">Account Name</label>
                                            <input type="text" name="account_name" class="form-control" placeholder="Enter Account Name " value="{{$bank->account_name}}">
                                            @error('account_name')
                                            <p style="color: red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account_number">Account Number</label>
                                            <input type="number" name="account_number" class="form-control" placeholder="Enter Account Number " value="{{$bank->account_number}}">
                                            @error('account_number')
                                            <p style="color: red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobile_number">Account PhonePay Number</label>
                                            <input type="number" name="mobile_number" class="form-control" placeholder="Enter Account PhonePay Number" value="{{$bank->mobile_number}}" >
                                            @error('mobile_number')
                                            <p style="color: red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                 
                                    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="image">Account QR </label>
                                                
                                                <input type="file" id="file-ip-1" accept="image/*" class="form-control-file border" onchange="showPreview1(event);" name="image">
                                                <img src="{{ asset('upload/images/bank_accounts/'.$bank->account_qr) }}" alt="{{ $bank->bank_name }}" width="200px">
                                                @error('image')
                                                        <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                <div class="preview mt-2">
                                                    <img src="" id="file-ip-1-preview" width="200px">
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
                                                    @if($bank->status == 'on')
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
                                </div>
                                <div class="card-footer">
                                    <div class="col-md-12 text-center" style=" margin-top: 10px;margin-bottom: 10px;">
                                        <button type="submit" class="btn btn-primary">Update <i
                                                class="bi bi-check"></i></button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>

                    </div>

               
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
    <script>
        $('textarea.summernote').summernote({
            placeholder: 'Enter  Company Description',
            tabsize: 2,
            height: 100,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ['fullscreen', 'codeview']],
                ['help', ['help']]
            ],
        });
    </script>
    <script>
        $('.extra-fields-customer').click(function() {
            $('.customer_records').clone().appendTo('.customer_records_dynamic');
            $('.customer_records_dynamic .customer_records').addClass('single remove');
            $('.single .extra-fields-customer').remove();
            $('.single').append(
                '<a href="#" class="remove-field btn-remove-customer badge badge-danger">Remove Product</a>');
            $('.customer_records_dynamic > .single').attr("class", "remove");

            $('.customer_records_dynamic input').each(function() {
                var count = 0;
                var fieldname = $(this).attr("name");
                $(this).attr('name', fieldname + count);
                count++;
            });

        });

        $(document).on('click', '.remove-field', function(e) {
            $(this).parent('.remove').remove();
            e.preventDefault();
        });
    </script>
@endsection

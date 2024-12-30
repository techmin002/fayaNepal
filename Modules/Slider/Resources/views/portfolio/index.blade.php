@extends('setting::layouts.master')

@section('title', 'Edit Portfolio')


@section('content')
    
                @if (isset($portfolio))
                
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="container-fluid">
                    <form id="product-form" action="{{ route('portfolio.update', $portfolio->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="portfolio">Portfolio</label>
                                                    <input type="text" name="portfolio" class="form-control"
                                                        placeholder="Enter portfolio " value="{{ $portfolio->portfolio }}"
                                                        required>
                                                    @error('portfolio')
                                                        <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary_direct">Beneficiary Direct</label>
                                                    <input type="text" name="beneficiary_direct" class="form-control"
                                                        placeholder="Enter beneficiary_direct"
                                                        value="{{ $portfolio->beneficiary_direct }}">
                                                    @error('beneficiary_direct')
                                                        <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary_indirect">Beneficiary In-Direct</label>
                                                    <input type="text" name="beneficiary_indirect" class="form-control"
                                                        placeholder="Enter beneficiary_indirect"
                                                        value="{{ $portfolio->beneficiary_indirect }}">
                                                    @error('beneficiary_indirect')
                                                        <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="project">Projects</label>
                                                    <input type="text" name="project" class="form-control"
                                                        placeholder="Enter project"
                                                        value="{{ $portfolio->project }}">
                                                    @error('project')
                                                        <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-md-12 text-center"
                                                style=" margin-top: 10px;margin-bottom: 10px;">
                                                <button type="submit" class="btn btn-primary">Update Portfolio <i
                                                        class="bi bi-check"></i></button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
            </section>
        </div>
                @else
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="container-fluid">
                    <form id="product-form" action="{{ route('portfolio.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="portfolio">Portfolio</label>
                                                    <input type="text" name="portfolio" class="form-control"
                                                        placeholder="Enter portfolio " value="{{ old('portfolio') }}"
                                                        required>
                                                    @error('portfolio')
                                                        <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary_direct">Beneficiary Direct</label>
                                                    <input type="text" name="beneficiary_direct" class="form-control"
                                                        placeholder="Enter beneficiary_direct"
                                                        value="{{ old('beneficiary_direct') }}">
                                                    @error('beneficiary_direct')
                                                        <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary_indirect">Beneficiary In-Direct</label>
                                                    <input type="text" name="beneficiary_indirect" class="form-control"
                                                        placeholder="Enter beneficiary_indirect"
                                                        value="{{ old('beneficiary_indirect') }}">
                                                    @error('beneficiary_indirect')
                                                        <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="project">Projects</label>
                                                    <input type="text" name="project" class="form-control"
                                                        placeholder="Enter project"
                                                        value="{{ old('project') }}">
                                                    @error('project')
                                                        <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-md-12 text-center"
                                                style=" margin-top: 10px;margin-bottom: 10px;">
                                                <button type="submit" class="btn btn-primary">Create Portfolio <i
                                                        class="bi bi-check"></i></button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
            </section>
        </div>
                @endif
         

@endsection

@extends('setting::layouts.master')

@section('title', 'Galleries')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Galleries</li>
    </ol>
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Gallery</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Galleries</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Galleries</h4>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($galleries as $key => $gallery)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $gallery->title }}</td>
                                                <td>{{ $gallery->category->title ?? 'N/A' }}</td>

                                                <td><a href="{{ asset($gallery->image) }}" target="_blank" title="Click to view"><img src="{{ asset($gallery->image) }}" alt="Gallery image" width="100"></a></td>
                                                
                                                <td class="text-center">
                                                    @if ($gallery->status == 'on')
                                                        <a href="{{ route('galleries.status', $gallery->id) }}"
                                                            class="btn btn-success">On</a>
                                                    @else
                                                        <a href="{{ route('galleries.status', $gallery->id) }}"
                                                            class="btn btn-danger">Off</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button id="delete" class="btn btn-danger btn-sm"
                                                        onclick="
                                        event.preventDefault();
                                        if (confirm('Are you sure? It will delete the data permanently!')) {
                                            document.getElementById('destroy{{ $gallery->id }}').submit()
                                        }
                                        ">
                                                        <i class="fa fa-trash"></i>
                                                        <form id="destroy{{ $gallery->id }}" class="d-none"
                                                            action="{{ route('galleries.destroy', $gallery->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                                <!-- Modal for Viewing Galleries -->
                                {{-- <div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="galleryModalLabel">Galleries in Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row" id="galleryContent">
                                                    <!-- Galleries will be loaded here via JavaScript -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Create Gallery</h4>
                            </div>
                            <form action="{{ route('galleries.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Enter Gallery Title">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select name="category" class="form-control">
                                            <option value="" disabled selected>Select Gallery Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="images">Images</label>
                                        <input type="file" id="file-ip-1" accept="image/*" class="form-control-file" name="images[]" multiple onchange="showPreviews(event);">
                                        @error('images')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                        <div class="preview mt-2 d-flex flex-wrap" id="file-preview-zone"></div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Publish</label>
                                        <input type="checkbox" name="status" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                    </div>
                                </div>
                                
                                <div class="card-footer">
                                    <button class="btn btn-success" type="submit">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

<script>
    let selectedFiles = []; // Store selected files

    function showPreviews(event) {
        let previewZone = document.getElementById('file-preview-zone');
        previewZone.innerHTML = ''; // Clear previous previews
        selectedFiles = Array.from(event.target.files); // Update selectedFiles with new files

        selectedFiles.forEach((file, index) => {
            let reader = new FileReader();
            reader.onload = function (e) {
                let previewContainer = document.createElement('div');
                previewContainer.classList.add('preview-container');
                previewContainer.style.position = 'relative';
                previewContainer.style.display = 'inline-block';
                previewContainer.style.margin = '10px';

                // Image preview
                let img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '100px';
                img.style.height = '100px';
                img.classList.add('m-2');

                // Delete icon
                let deleteIcon = document.createElement('span');
                deleteIcon.innerHTML = '&times;';
                deleteIcon.style.position = 'absolute';
                deleteIcon.style.top = '5px';
                deleteIcon.style.right = '5px';
                deleteIcon.style.cursor = 'pointer';
                deleteIcon.style.color = 'red';
                deleteIcon.style.fontSize = '20px';
                deleteIcon.addEventListener('click', function() {
                    removeImage(index); // Call removeImage function with index
                });

                previewContainer.appendChild(img);
                previewContainer.appendChild(deleteIcon);
                previewZone.appendChild(previewContainer);
            };
            reader.readAsDataURL(file);
        });
    }

    function removeImage(index) {
        selectedFiles.splice(index, 1); // Remove the file from selectedFiles array

        // Update the file input with new files
        let dataTransfer = new DataTransfer();
        selectedFiles.forEach(file => {
            dataTransfer.items.add(file);
        });
        document.getElementById('file-ip-1').files = dataTransfer.files;

        // Refresh previews
        showPreviews({ target: { files: selectedFiles } });
    }
</script>
{{-- <script>
    function fetchGalleries(categoryId) {
        $.ajax({
            url: '{{ url("galleries-category-data") }}/' + categoryId,
            type: 'GET',
            success: function(data) {
                let galleryContent = document.getElementById('galleryContent');
                galleryContent.innerHTML = ''; // Clear previous content
    
                if (data.length > 0) {
                    data.forEach(gallery => {
                        let galleryHTML = `
                            <div class="col-md-4 text-center">
                                <h5>${gallery.title}</h5>
                                <img src="{{ asset('') }}${gallery.image}" alt="${gallery.title}" class="img-fluid mb-2" width="100%">
                            </div>
                        `;
                        galleryContent.insertAdjacentHTML('beforeend', galleryHTML);
                    });
                } else {
                    galleryContent.innerHTML = '<p>No galleries available for this category.</p>';
                }
            },
            error: function(error) {
                console.error('Error fetching galleries:', error);
            }
        });
    }
</script> --}}
    
<style>
    .preview-container {
        position: relative;
        display: inline-block;
        margin: 5px;
    }
</style>

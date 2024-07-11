@extends('admin.master')

@section('content')
<div class="page-wrapper mt-0">
    <div class="card bg-dark text-white">
        <img class="w-100" src="{{ asset('ui-images/1.png') }}" alt="Card image" style="height: 650px; filter: blur(5px); object-fit: cover;">
        <div class="card-img-overlay">
            <!-- Page Content -->
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-8">
                            <div class="d-flex justify-content-center gap-2">
                                <div>
                                    <h5 class="page-title text-decoration-none text-white mt-1 p-2 border-bottom border-primary hover-grow-card">
                                        Edit Service Category
                                    </h5>
                                </div>
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Form -->
                <div class="border p-3">
                    <div class="">
                        <form action="{{route('admin.service.category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-2">
                                <label for="name" class="form-label">Category Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}" placeholder="Enter category name">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="1" placeholder="Enter description">{{ old('description', $category->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="image" class="form-label">Current Image</label>
                                <br>
                                @if ($category->image)
                                    <img src="{{ asset('storage/images/' . $category->image) }}" alt="Category Image" style="width:30px; height: auto;">
                                    <br><br>
                                @else
                                    <p>No image uploaded.</p>
                                @endif
                                <label for="image" class="form-label">Upload New Image (Optional)</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm">Update Category</button>
                            <a href="{{ route('admin.service.category.list') }}" class="btn btn-secondary btn-sm">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

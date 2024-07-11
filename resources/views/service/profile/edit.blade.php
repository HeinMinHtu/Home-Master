@extends('service.master')
@section('content')
<div class="page-wrapper mt-0 ">
    <div class="card  bg-dark text-white">
        <img class="w-100" src="{{ asset('ui-images/1.png') }}" alt="Card image"
            style="height: 640px; filter: blur(10px); object-fit: cover;">
        <div class="card-img-overlay">

<div style="height: 100px">

</div>
<div class="container  my-3 d-flex justify-content-center p-2">



<form action="{{route('service.photo.update')}}" class="border border-primary pt-3 p-3" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Use PUT method for updating -->
    <div class="modal-body">
        <div class="mb-3">
            <label for="image" class="form-label">Choose Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
    </div>
    <div class="modal-footer">

        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{route('service.profie.index')}}" type="button" class="btn btn-sm mt-4 wbtn text-white border border-primary " >Back</a>
    </div>
</form>
</div>
        </div></div>
@endsection

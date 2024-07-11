@extends('UI.master')
@section('content')
<style>

</style>
<div style="height: 100px">

</div>
<div class="container  my-3 d-flex justify-content-center">



<form action="{{route('user.photo.update')}}" class="border border-primary pt-3" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Use PUT method for updating -->
    <div class="modal-body">
        <div class="mb-3">
            <label for="image" class="form-label">Choose Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
    </div>
    <div class="modal-footer">
        <a href="{{route('user.profile')}}" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</a>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</form>
</div>
@endsection

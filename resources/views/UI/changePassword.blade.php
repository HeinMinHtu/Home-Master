@extends('UI.master')
@section('content')
<div class="card-img-overlay">
    <!-- Page Content -->
    <div class="content container mt-5">
        <div class="d-flex justify-content-center mt-5">
            <div class="col-md-5 mt-5">
                <div class="border border-primary mt-3">
                    <form action="{{route('user.password.update')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="old_password"><b>Old Password</b></label>
                                <input type="password" name="old_password"
                                    class="form-control @error('old_password') is-invalid @enderror">
                                @error('old_password')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="new_password"><b>New Password</b></label>
                                <input type="password" name="new_password"
                                    class="form-control @error('new_password') is-invalid @enderror">
                                @error('new_password')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="new_password_confirmation"><b>Confirm New Password</b></label>
                                <input type="password" name="new_password_confirmation" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer border-0">
                            <button type="submit" class="btn wtext border border-primary ">Update</button>
                            <a href="{{route('user.profile')}}" class="btn wtext border border-primary ">Back</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    @endsection

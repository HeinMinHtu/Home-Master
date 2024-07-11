@extends('UI.master')

@section('content')
    <div class="container">
        <div style="height: 50px"></div>
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-8 col-md-6">
                <div class="border wtext wborder p-3">
                    <form action="{{ route('register.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3 class="text-center mb-4">အကောင့်ပြုလုပ်ရန်</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="image-upload" class="mb-1"><b>Upload Image</b></label>
                                    <input id="image-upload" type="file"
                                        class="form-control border-0 shadow @error('image') is-invalid @enderror"
                                        name="image">
                                    @error('image')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="mb-1"><b>Name</b></label>
                                    <input id="name" type="text"
                                        class="form-control border-0 shadow @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>



                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="mb-2"><b>E-Mail Address</b></label>
                                    <input id="email" type="email"
                                        class="form-control border-0 shadow @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="mb-1"><b>Password</b></label>
                                    <input id="password" type="password"
                                        class="form-control border-0 shadow @error('password') is-invalid @enderror"
                                        name="password"  value="{{ old('password') }}">
                                    @error('password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="mb-1"><b>Phone</b></label>
                                    <input id="phone" type="text"
                                        class="form-control border-0 shadow @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ old('phone') }}" autofocus>
                                    @error('phone')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="role-select" class="mb-1"><b>Select Role</b></label>
                                    <select id="role-select"
                                        class="form-control border-0 shadow @error('role') is-invalid @enderror"
                                        name="role">
                                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>အသုံးပြုသူ
                                        </option>
                                        <option value="service" {{ old('role') == 'service' ? 'selected' : '' }}>
                                            ၀န်ဆောင်မှုပေးသူ</option>
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <div class="col-md-10 offset-md-1 text-center">
                                <small>If you have already registered <a href="{{ route('login') }}" title="Login">click
                                        here</a> to login</small>
                                <button type="submit" class="btn btn-sm  wbtn text-white border border-primary ">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="section-twitter">
        <i class="fa fa-twitter icon-big"></i>
    </div>
@endsection

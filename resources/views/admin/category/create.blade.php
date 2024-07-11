@extends('admin.master')
@section('content')
<div class="page-wrapper mt-0 ">
    <div class="card  bg-dark  text-white">
        <img class="w-100" src="{{asset('ui-images/1.png')}}" alt="Card image" style="height: 640px; filter: blur(10px); object-fit: cover;">
        <div class="card-img-overlay">
    <!-- Page Content -->
    <div class="content container">
        <!-- Page Header -->

<div class="d-flex justify-content-between">
    <h4>ကဏ္ဍ အသစ်ထည်မည်</h4>
    <a href="{{route('admin.service.category.list')}}" class="btn btn-sm wbtn text-white mb-3">ပြန်ထွက်မည်</a>
</div>
    <div class="border mt-3 p-3">
        <form action="{{route('admin.service.category.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="image"><b>Service ကဏ္ဍ ရဲ့ ပုံ</b></label>
                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name"><b>Service ကဏ္ဍ အမည်</b></label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter category name">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description"><b>Service ကဏ္ဍ ရှင်းလင်းဖော်ပြချက်</b></label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter description"></textarea>
                    @error('description')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="ms-3 border-0">
                <button class="btn btn-sm wbtn text-white">ထည့်မည်</button>
            </div>
        </form>
    </div></div></div>
@endsection

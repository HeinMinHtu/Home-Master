@extends('UI.master')
@section('content')
<style>
    .post-card {
        max-width: 900px;
        margin: auto;
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: 0.8s;
        padding: 10px

    }
    .post-card:hover {
        box-shadow: 0 8px 50px rgba(0, 0, 0, 0.2);

    }
    .post-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .post-content {
        padding: 20px;
    }
    .post-title {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }
    .post-text {
        color: gray;
        font-size: 14px;
        margin-bottom: 15px;
    }
    .btn-see-more {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    .btn-see-more:hover {
        background-color: #0056b3;
    }
</style>
<div style="height: 80px"></div>
<div class="mt-5">
    <section id="about" class="container mt-4 mb-5">
        <h3 class="text-center fw-bold text-decoration-none mb-3" style="color:rgb(25, 58, 25)" data-aos="fade-right" data-aos="zoom-in-right" data-aos-duration="1000" data-aos-delay="200" data-aos-offset="50"></h3>

        @foreach ($categories as $category)
            <div class="row post-card align-items-center mb-5">
                <div class="col-md-6 mb-3" data-aos="fade-left" data-bs-toggle="collapse" data-aos="zoom-in-right" data-aos-duration="1000" data-aos-delay="200" data-aos-offset="50">
                    <img src="{{ asset('storage/images/'.$category->image) }}" style="height: 300px;width:100%" class="img-fluid rounded custombox shadow" alt="About Us Image">
                </div>
                <div class="col-md-6" data-aos="fade-left" data-bs-toggle="collapse" data-aos="zoom-in-right" data-aos-duration="1000" data-aos-delay="200" data-aos-offset="50">
                    <h4 class="fw-bold text-decoration-none mb-2" style="color:rgb(134, 151, 134)">{{ $category->name }}</h4>
                    <ul class="text-sm" style="text-align: justify; font-size: 1rem; color: rgb(25, 58, 25)" data-aos="fade-right" data-aos="zoom-in-right" data-aos-duration="1000" data-aos-delay="400" data-aos-offset="50">
                        <li class="post-text">{{ $category->description }}</li>
                        <li><a href="{{ route('user.category.post.list', $category->id) }}" class="btn btn-sm mt-4 wbtn text-white border border-primary">ပိုစ့်များကြည့်ရန်</a></li>
                    </ul>
                </div>
            </div>
            <hr class="line mt-4">
        @endforeach
    </section>
</div>
@endsection

@extends('UI.contact')

@section('content')
<style>
    .post-card {
        max-width: 350px;
        margin: auto;
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: 0.8s;

        transform: scale(1);
    }
    .post-card:hover {
        box-shadow: 0 8px 50px rgba(0, 0, 0, 0.2);
        transform: scale(1.02);
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

<div style="height:50px"></div>

<section class="service_section">
    <div class="container">
        <div class="heading_container heading_center">
            @if($posts->isEmpty())
                <div style="min-height: 500px" class="mt-4">
                    <h1>သက်ဆိုင်သောပိုစ့်များ မရှိပါ
                        <span>
                            <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>
                        </span>
                    </h1>
                </div>
            @else
                <h2>Posts</h2>
            @endif
        </div>

        <div class="row">
            @foreach ($posts as $post)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-left" data-bs-toggle="collapse" data-aos-duration="1000" data-aos-delay="200" data-aos-offset="50">
                    <div class="post-card" style="height: 400px">
                        <img src="{{ asset('storage/images/' . $post->image) }}" alt="Post Image" class="post-img">
                        <div class="post-content">
                            <h5 class="post-title">{{ $post->title }}</h5>
                            <p class="post-text" style="min-height: 100px">{{ strlen($post->description) > 80 ? substr($post->description, 0, 100) . '...' : $post->description }}</p>
                            <a href="{{ route('newFeed.post.detail', $post->id) }}" class="btn-see-more">See More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

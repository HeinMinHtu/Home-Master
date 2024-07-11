@extends('UI.master')
@section('content')
<style>
    .profile-card {
        max-width: 350px;
        margin: auto;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        text-align: center;
        padding: 20px;
        transition: 0.3s;
    }
    .profile-card:hover {
        box-shadow: 0 30px 16px rgba(97, 10, 10, 0.2);
    }
    .profile-img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-bottom: 15px;
    }
    .profile-info {
        margin-bottom: 15px;
    }
    .profile-info h3 {
        margin: 0;
    }
    .profile-info p {
        color: gray;
        font-size: 14px;
    }
    .social-links a {
        color: #333;
        margin: 0 10px;
        transition: color 0.3s;
    }
    .social-links a:hover {
        color: #007bff;
    }
</style>

    <div style="height:80px"></div>

    <div class="row">
        @foreach ($services as $serviceProvider)
            <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-left" data-bs-toggle="collapse" data-aos-duration="1000" data-aos-delay="200" data-aos-offset="50">
                <div class="profile-card mt-5">
                    @if($serviceProvider->image)
                        <img src="{{ asset('storage/images/'.$serviceProvider->image) }}" alt="Profile Image" class="profile-img">
                    @else
                        <img src="{{ asset('vv/images/1.jpg') }}" alt="Profile Image" class="profile-img">
                    @endif
                    <div class="profile-info">
                        <p><a href="{{route('ui.serviceProvider.detail',$serviceProvider->id)}}" class="text-gray-700">{{ $serviceProvider->name }}</a></p>
                        <p>၀န်ဆောင်မှုပေးသူ</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div style="height:80px"></div>

    <div class="row">
@endsection

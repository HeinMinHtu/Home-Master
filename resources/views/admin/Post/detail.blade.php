@extends('admin.master')
@section('content')
<div class="page-wrapper mt-0">
    <div class="card bg-dark text-white">
        <img class="w-100" src="{{ asset('ui-images/1.png') }}" alt="Card image"
            style="height: 640px; filter: blur(50px); object-fit: cover;">
        <div class="card-img-overlay">
<section class="about_section layout_padding">
    <div style="height:100px">

    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-6">
          <div class="detail-box">
            <h4>
                ၀န်ဆောင်မှုကဏ္ဍ : {{$post->category->name}}
            </h4>
            <p><a href="{{route('admin.customer.detail',$post->user->id)}}" class="text-decoration-none text-white">တင်သူ : {{$post->user->name}}</a>
             <p>Phone : {{$post->user->phone}}</p>
             </p>
            <p>
               {{$post->description}}
            </p>
            <p>
                အခြေနေ :
                @if($post->status === 'accept')
                    <span class="text-success">သင်သည် Postအား Approved ပေးလိုက်ပါပီ</span>
                @elseif($post->status === 'reject')
                    <span class="text-warning">သင်သည် Post အား ငြင်းပယ်လိုက်ပါပီ</span>
                @else
                    <span class="text-muted">Approvedပေးရန်စောင့်ဆိုင်းနေပါသည်</span>
                @endif
            </p>

            </p>
            <button class="btn btn-success btn-sm">
                <i class="fas fa-dollar-sign" style="color: white"></i> : {{$post->price}}
            </button>
            <a href="{{route('admin.posts.list')}}" class="btn btn-success btn-sm">
                Back
              </a>
          </div>
        </div>
        <div class="col-lg-7 col-md-6">
          <div class="img-box">
            <img src="{{asset('storage/images/'.$post->image)}}" style="width: 100%;height:300px" class="rounded-lg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
        </div></div>

@endsection

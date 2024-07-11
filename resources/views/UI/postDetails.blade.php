@extends('UI.master')
@section('content')
    <style>
        body .title {
            margin-bottom: 5vh;
        }

        .card {

            margin: auto;
            max-width: 950px;
            width: 90%;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);

            border: transparent;
        }

        @media(max-width:767px) {
            .card {
                margin: 3vh auto;
            }
        }

        .cart {
            background-color: #ffffff;
            padding: 3vh 3vh;


        }

        @media(max-width:767px) {
            .cart {
                padding: 4vh;
                border-bottom-left-radius: unset;
                border-top-right-radius: 1rem;
            }
        }

        .summary {
            background-color: #ddd;
            border-top-right-radius: 1rem;
            border-bottom-right-radius: 1rem;
            padding: 4vh;
            color: rgb(65, 65, 65);
        }

        @media(max-width:767px) {
            .summary {
                border-top-right-radius: unset;
                border-bottom-left-radius: 1rem;
            }
        }

        .summary .col-2 {
            padding: 0;
        }

        .summary .col-10 {
            padding: 0;
        }

        .row {
            margin: 0;
        }

        .title b {
            font-size: 1.5rem;
        }

        .main {
            margin: 0;
            padding: 2vh 0;
            width: 100%;
        }

        .col-2,
        .col {
            padding: 0 1vh;
        }

        a {
            padding: 0 1vh;
        }

        .close {
            margin-left: auto;
            font-size: 0.7rem;
        }

        img {
            width: 3.5rem;
        }

        .back-to-shop {
            margin-top: 4.5rem;
        }

        h5 {
            margin-top: 4vh;
        }

        hr {
            margin-top: 1.25rem;
        }

        form {
            padding: 2vh 0;
        }

        select {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1.5vh 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input:focus::-webkit-input-placeholder {
            color: transparent;
        }

        .btn {
            background-color: #030442;
            border-color: #000;
            color: white;
            width: 100%;
            font-size: 0.7rem;
            margin-top: 4vh;
            padding: 1vh;
            border-radius: 0;
        }

        .btn:focus {
            box-shadow: none;
            outline: none;
            box-shadow: none;
            color: white;
            -webkit-box-shadow: none;
            -webkit-user-select: none;
            transition: none;
        }

        .btn:hover {
            color: white;
        }

        a {
            color: rgb(34, 6, 85);
        }

        a:hover {
            color: rgb(46, 11, 112);
            text-decoration: none;
        }

        #code {
            background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: center;
        }
    </style>
    <div style="height: 50px">

    </div>
    <div class="card border border-primary p-3"  data-aos="fade-left" data-bs-toggle="collapse" data-aos-duration="1000"
    data-aos-delay="200" data-aos-offset="50" >
        <div class="row">
            <div class="col-md-6 cart">
                <div class="title">

                </div>

                <div class="row">
                    <div class="col-md-12  " >
                        <div class="card border-0 shadow " class="height:200px" style="overflow: hidden">
                            <div class="card-body ">
                                <img src="{{ asset('storage/images/' . $post->image) }}" alt="Post Image"
                                    style="width:100%;height:300px">
                                <div class="mb-3">
                                    <i class="bi bi-people-fill text-success" style="font-size: 3rem;"></i>
                                </div>

                                </span></h5>


                            </div>
                        </div>
                        <p class="card-text text-muted mt-4" style="text-align: justify;">
                            {{ $post->description }}


                        </p>
                    </div>
                </div>
                <div class="row">
                    <h5 class="card-title fw-bold text-muted"><img src="{{ asset('storage/images/' . $post->user->image) }}"
                            class="rounded-circle"><a href="{{route('ui.serviceProvider.detail',$post->user->id)}}">{{ $post->user->name }}</a></h5>
                    <div class="col align-self-center text-right text-muted"><i class="fas fa-clock"></i>
                        {{ $post->created_at->diffForHumans() }}
                    </div>
                </div>

                <div class="row">

                    <div class="col  text-center text-muted">
                        <button class="btn" style="width: 50%">{{ $post->price }} MMK</button>
                    </div>

                </div>

            </div>
            <div class="col-md-6 summary">
                <div>
                    <h5><b>Booking တင်ရန် </b></h5>
                </div>
                <hr>
                <div class="row">
                    <div class="col-7" style="padding-left:0;">၀န်ဆောင်မှုစရိတ်</div>
                    <div class="col-5 text-right">{{$post->price}} MMK</div>
                </div>
                <div class="row">
                    <div class="col-7" style="padding-left:0;">ရယူထားသော ၀န်ဆောင်မှု</div>
                    <div class="col-5 text-right">{{$post->category->name}}</div>
                </div>
                <div class="row">
                    <div class="col-7" style="padding-left:0;">၀န်ဆောင်မှု‌ပေးသူ</div>
                    <div class="col-5 text-right">{{$post->user->name}}</div>
                </div>
                <div class="row">
                    <div class="col-7" style="padding-left:0;">ဆက်သွယ်ရန်ဖုန်းနံပါတ်</div>
                    <div class="col-5 text-right">{{$post->user->phone}}</div>
                </div>
                <div class="row">
                    <div class="col-7" style="padding-left:0;">ဆက်သွယ်ရန် အီးမေးလ်</div>
                    <div class="col-5 text-right">{{$post->user->email}}</div>
                </div>
                <form action="{{route('user.create.booking')}}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                    <p>၀န်ဆောင်မှုရယူလိုသော ရက်စွဲကိုထည့်ပါ</p>
                    <input type="date" name="booking_time" placeholder="Enter Date"  class="form-control @error('booking_time') is-invalid @enderror">
                    @error('booking_time')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <p>Service ပေးရမည် လိပ်စာထည့်ပါ</p>
                    <input type="text" name="address" placeholder="Enter Address"  class="form-control @error('address') is-invalid @enderror">
                    @error('address')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror


                    <p>ဖော်ပြချက်ထည့်ရန်</p>
                    <input type="text" name="notes" placeholder="Enter Notes"  class="form-control @error('notes') is-invalid @enderror">
                    @error('notes')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                    <button type="submit" class="btn">၀န်ဆောင်မှုအားရယူမည်</button>
                    <a href="{{url()->previous()}}"  class="btn">ပြန်ထွက်မည်</a>
                </form>


            </div>
        </div>

    </div>
    <div style="height: 100px">

    </div>
@endsection

@extends('admin.master')
@section('content')
    <div class="page-wrapper mt-0 ">
        <div class="card  bg-dark text-white">
            <img class="w-100" src="{{ asset('ui-images/1.png') }}" alt="Card image"
                style="height: 640px; filter: blur(10px); object-fit: cover;">
            <div class="card-img-overlay">

                <div class="container my-1 d-flex justify-content-center">


                </div>
                <div>

                    <div class="row justify-content-center">
                        <div class="col-md-12 mb-5">
                            <div class="border border-primary pt-3 mt-3 rounded shadow">
                                <!-- Added border-primary for border color -->

                                <ul class="list-group list-group-flush p-3">

                                    <div class="mb-3 text-center">
                                        @if ($user->image)
                                            <img src="{{ asset('storage/images/' . $user->image) }}"
                                                class="profileimg rounded-circle"
                                                style="width: 200px; height:200px; object-fit:cover">
                                        @else
                                            <p class="text-white"><b>No photo available !</b></p>
                                        @endif
                                    </div>

                                    <li class="list-group-item bg-transparent text-white"><b>Name :</b>&nbsp;
                                        {{ $user->name }}
                                    </li>
                                    <li class="list-group-item bg-transparent text-white"><b>Email :</b>&nbsp;
                                        {{ $user->email }}
                                    </li>
                                    <li class="list-group-item bg-transparent text-white"><b>Phone No :</b>&nbsp;
                                        {{ $user->phone }}
                                    </li>
                                    <li class="list-group-item bg-transparent text-white"><b>Role :</b>&nbsp;
                                        @if($user->role=="user")
                                        အသုံးပြုသူ
                                        @else
                                        ၀န်ဆောင်မှုပေးသူ
                                        @endif
                                    </li>
                                    @if($user->role==='user')
                                    <li class="list-group-item bg-transparent text-white"><b>Booking :</b>&nbsp;
                                        <a href="{{route('admin.user.booking.list',$user->id)}}" class="text-decoration-none"> Booking များ</a>
                                    </li>
                                    @endif
                                    @if($user->role==='service')
                                    <li class="list-group-item bg-transparent text-white"><b>PostList :</b>&nbsp;
                                        <a href="{{route('admin.service.post.list',$user->id)}}" class="text-decoration-none">တင်ထားသောPost များ</a>

                                    </li>
                                    @endif
                                    <li class="list-group-item bg-transparent text-white">
                                        <a href="{{url()->previous()}}" class="btn btn-sm wbtn border text-white fw-bold float-end">Back</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Modal -->


                    </div>
                </div>
            </div>
        </div>
    @endsection

@extends('service.master')
@section('content')
    <div class="page-wrapper mt-0 ">
        <div class="card  bg-dark text-white">
            <img class="w-100" src="{{ asset('ui-images/1.png') }}" alt="Card image"
                style="height: 640px; filter: blur(10px); object-fit: cover;">
            <div class="card-img-overlay">

                <div class="container my-3 d-flex justify-content-center">


                </div>
                <div>

                    <div class="row justify-content-center">
                        <div class="col-md-6 mb-5">
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
                                    <li class="list-group-item bg-transparent text-white"><b>Role :</b>&nbsp;
                                        @if($user->role=='service')
                                        ၀န်ဆောင်မှုပေးသူ
                                        @endif
                                    </li>
                                    <li class="list-group-item bg-transparent text-white">
                                        <a href="{{route('service.photo.edit')}}" type="button" class="btn btn-sm  wbtn text-white border  ">
                                            @if ($user->image)
                                                Upload Photo
                                            @else
                                                Upload
                                            @endif
                                        </a>
                                      <a href="{{route('service.password.edit')}}" class="btn btn-sm wbtn border text-white fw-bold float-end">Change Password</a>
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

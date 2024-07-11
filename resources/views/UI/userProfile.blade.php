@extends('UI.master')
@section('content')

<div class="container my-3 d-flex justify-content-center">


</div>
<div>

    <div class="row justify-content-center">
        <div class="col-md-3 mb-5">
            <div class="border border-primary pt-3 mt-3 rounded shadow"> <!-- Added border-primary for border color -->

                <ul class="list-group list-group-flush p-3">

                    <div class="mb-3 text-center">
                        @if($user->image)
                        <img src="{{ asset('storage/images/'.$user->image) }}" class="profileimg rounded-circle"
                            style="width: 200px; height:200px; object-fit:cover">
                        @else
                        <p class="text-white"><b>No photo available !</b></p>
                        @endif
                    </div>

                    <li class="list-group-item bg-transparent wtext"><b>Name :</b>&nbsp; {{$user->name}}
                    </li>
                    <li class="list-group-item bg-transparent wtext"><b>Email :</b>&nbsp; {{$user->email}}
                    </li>
                    <li class="list-group-item bg-transparent wtext"><b>Role :</b>&nbsp; @if($user->role=="user")
                        အသုံးပြုသူ
                        @endif
                    </li>
                    <li class="list-group-item bg-transparent wtext">
                        <a href="{{route('user.photo.edit')}}" type="button" class="btn btn-sm  wbtn text-white border border-primary "
                           >
                            @if($user->image)
                            Upload Photo
                            @else
                            Upload
                            @endif
                        </a>
                        <a href="{{route('user.password.edit')}}" type="button" class="btn btn-sm  wbtn text-white border border-primary "
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                          Change Password
                        </a>

                    </li>
                </ul>
            </div>
        </div>
        <!-- Modal -->


    </div>
</div>
@endsection

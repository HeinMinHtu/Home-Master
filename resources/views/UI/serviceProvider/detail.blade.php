@extends('UI.master')
@section('content')

<div class="container my-1 d-flex justify-content-center">


</div>
<div class="row  p-4">


        <div class="col-3">

                <div class="border border-primary pt-3 mt-3 rounded shadow">
                    <!-- Added border-primary for border color -->
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
                        <li class="list-group-item bg-transparent wtext"><b>Role :</b>&nbsp; @if($user->role=="service")
                            ၀န်ဆောင်မှုပေးသူ
                            @endif
                        </li>
                        <li class="list-group-item bg-transparent wtext">Posts :</b>&nbsp;
                            <a href="{{ route('ui.serviceProvider.post.list',$user->id) }}" type="button" class="btn btn-sm mt-4 wbtn text-white border border-primary ">
                                တင်ခဲ့သော ပိုစ့်များ
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="border border-primary pt-3 mt-3 rounded shadow">

                    <form class="p-3" action="{{ route('ui.review.store') }}" method="post">
                        @csrf

                        <!-- Display validation errors -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="form-group p-4">
                            <label for="review">ရီ‌ဗျူးရေးရန်</label>
                            <!-- Hidden input for service_provider_id -->
                            <input type="hidden" name="service_provider_id" value="{{ $user->id }}">

                            <!-- Textarea for review_text with error handling -->
                            <textarea class="form-control @error('review_text') is-invalid @enderror" name="review_text" id="review" rows="5" placeholder="Write your review here...">{{ old('review_text') }}</textarea>

                            <!-- Error message for review_text -->
                            @error('review_text')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-sm mt-4 wbtn text-white border border-primary ">Submit</button>
                    </form>

                </div>


        </div>
        <div class="col-4" >
            @if($posts->isEmpty())
            <h4>၀န်ဆောင်မှုပေးသူသည်  ပိုစ့်တင်ထားခြင်း မရှိပါ။</h4>
            <a href="{{url()->previous()}}" class=" btn-sm border border-primary  ">Back</a>
            @else
            <div class="border border-primary pt-3 mt-3 rounded shadow p-3" style="height: 800px">
                Latest Post :&nbsp;<span style="color: red">  {{count($posts)}}</span>
                <a href="{{url()->previous()}}" class=" btn-sm border border-primary  ">Back</a>
                @foreach ($posts as $post)
                <div class="row mt-2 border p-3 ">
                 <div class="col-2"> <img class="rounded-circle" style="width:50px;height:50px" src="{{asset('storage/images/'.$post->image)}}"></div>
                 <div class="col-10"><span style="font-size: 0.8rem"> {{ strlen($post->description) > 100 ? substr($post->description, 0, 250) . '...' : $post->description }}<a href="{{route('newFeed.post.detail',$post->id)}}">SeeMore</a></span></div>


                </div>

                @endforeach


             </div>
            @endif
        </div>
        <div class="col-5" style="overflow:hidden">
            @if($reviews->isEmpty())
            <h4>၀န်ဆောင်မှုပေးသူသည် ရီ‌ဗျူးရေးခံခြင်း မရှိပါ။</h4>
            @else
            <div class="border border-primary pt-3 mt-3 rounded shadow p-3" style="height: 800px;overflow:hidden" >
                Latest reviews :&nbsp;<span style="color: red">  {{count($reviews)}}</span>

                @foreach ($reviews as $review)
                <div class="row mt-2 border p-2">
                    <div class="col-2">
                        <img class="rounded-circle" style="width: 50px; height: 50px;" src="{{ asset('storage/images/'.$review->user->image) }}">
                    </div>
                    <div class="col-10">
                        <span style="font-size: 0.8rem;">{{ $review->user->name }} &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <i class="fas fa-clock" style="color: blue"></i>
                            {{$review->created_at->diffForHumans()}}</span>
                    </div>
                    <p style="font-size: 0.8rem; margin-left: 100px;">{{ $review->review_text }}</p>
                    &nbsp;&nbsp;&nbsp;<a href="{{route('ui.review.delete',$review->id)}}"><i class="fas fa-trash" style="color: red"></i></a>
                </div>
            @endforeach


             </div>
            @endif

        </div>

    </div>
</div>
@endsection

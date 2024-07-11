@extends('UI.master')
@section('content')


<section class="content-central">
    <div class="content_info">
        <div class="paddings-mini">

            <div class="container">
                <div class="row portfolioContainer">
                    <div class="col-xs-12 col-sm-3 col-md-3 profile1">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 profile1" style="min-height: 100px;">
                        <div class="thinborder-ontop " >

                            <div class= " border wtext wborder p-3 mt-5">

                                <form action="{{ route('login.store') }}" method="post"> @csrf
                                    <h3>အကောင့်၀င်ရန်</h3>


                                    <div class=" p-4 border-0 ">
                                        <div class="mb-3">
                                            <label for="email" class="mb-2"><b>Email</b></label>
                                            <input type="text" name="email" value="{{ old('email') }}"
                                                class="form-control border-0 shadow @error('email') is-invalid @enderror"
                                                id="email" placeholder="Enter your email">
                                            @error('email')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="mb-2"><b>လျှိုဝှက်နံပါတ်ထည့်ရန်</b></label>
                                            <input type="password" name="password"
                                                class="form-control border-0 shadow @error('password') is-invalid @enderror"
                                                id="password" placeholder="Enter your password">
                                            @error('password')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="my-2">
                                            <button class="btn btn-sm  wbtn text-white border border-primary ">၀င်မည်</button>
                                            <div class="text-black">အကောင့်မရှိဘူးလား? <a href="{{ route('register') }}"><b
                                                        class="btn btn-sm wbtn text-white border border-primary ">အကောင့်သစ်
                                                        Register လုပ်ရန်</b></a></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 profile1">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-twitter">
        <i class="fa fa-twitter icon-big"></i>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


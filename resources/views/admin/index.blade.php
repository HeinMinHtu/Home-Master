<!-- resources/views/dashboard.blade.php -->
@extends('admin.master')
@section('content')
<!-- resources/views/dashboard.blade.php -->
<div class="page-wrapper mt-0 ">
    <div class="card  bg-dark text-white">
        <h3 style="text-align: center; margin-top: 40px; color:rgb(238, 238, 238);">သူံးစွဲသူများအချက်အလက်</h3>
        <img class="w-100" src="{{ asset('ui-images/1.png') }}" alt="Card image"
            style="height: 640px; filter: blur(200px); object-fit: cover;">

        <div class="card-img-overlay">
<div style="height: 100px"></div>
<div class="container row">
    <div class="col-xl-6 col-md-6 mb-4 ">
        <div class="border border-primary  border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <a href="" class="row no-gutters align-items-center text-decoration-none">
                    <div class="col mr-2">
                        <div class="text-x font-weight-bold  text-uppercase mb-1" style="color:rgb(238, 238, 238)">
                            အသုံးပြုသူ</div>
                        <div class="h5 mb-0 font-weight-bold text-white">Total -{{count($users)}}  </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users" style="color: rgb(234, 236, 233); width :64px"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="border border-primary  border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <a href="" class="row no-gutters align-items-center text-decoration-none">
                    <div class="col mr-2">
                        <div class="text-x font-weight-bold  text-uppercase mb-1" style="color:rgb(238, 238, 238)">
                            ၀န်ဆောင်မှုပေးသူ</div>
                        <div class="h5 mb-0 font-weight-bold text-white">Total -{{count($providers)}} </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users" style="color: rgb(234, 236, 233); width :64px"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="container row">
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="border border-primary  border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <a href="" class="row no-gutters align-items-center text-decoration-none">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold  text-uppercase mb-1" style="color:rgb(238, 238, 238)">
                            Reject ထိထားသော Post များ</div>
                        <div class="h5 mb-0 font-weight-bold text-white">Total - {{count($rejectPosts)}} </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users" style="color: rgb(234, 236, 233); width :64px"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-4 ">
        <div class="border border-primary  border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <a href="" class="row no-gutters align-items-center text-decoration-none">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold  text-uppercase mb-1" style="color:rgb(238, 238, 238)">
                            Approveပေးရန် စောင့်ဆိုင်းနေသော ပိုစ့်များ</div>
                        <div class="h5 mb-0 font-weight-bold text-white">Total -{{count($pendingPosts)}} </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users" style="color: rgb(234, 236, 233); width :64px"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-4 ">
        <div class="border border-primary  border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <a href="" class="row no-gutters align-items-center text-decoration-none">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold  text-uppercase mb-1" style="color:rgb(238, 238, 238)">
                            သင် လက်ခံထားသော Postများ</div>
                        <div class="h5 mb-0 font-weight-bold text-white">Total -{{count($acceptPosts)}} </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users" style="color: rgb(234, 236, 233); width :64px"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-4 ">
        <div class="border border-primary   shadow h-100 py-2">
            <div class="card-body">
                <a href="" class="row no-gutters align-items-center text-decoration-none">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold  text-uppercase mb-1" style="color:rgb(238, 238, 238)">
                            Reviewsများ</div>
                        <div class="h5 mb-0 font-weight-bold text-white">Total -{{count($reviews)}} </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users" style="color: rgb(234, 236, 233); width :64px"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

</div>
        </div></div>
@endsection



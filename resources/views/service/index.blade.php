<!-- resources/views/dashboard.blade.php -->
@extends('service.master')

@section('content')
<div class="page-wrapper mt-0 ">
    <div class="card  bg-dark text-white">
        <img class="w-100" src="{{ asset('ui-images/1.png') }}" alt="Card image"
            style="height: 640px; filter: blur(80px); object-fit: cover;">
        <div class="card-img-overlay">
<div style="height: 250px"></div>
<div class="container row">
    <div class="col-xl-3 col-md-6 mb-4 ">
        <div class="border border-primary  border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <a href="" class="row no-gutters align-items-center text-decoration-none">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold  text-uppercase mb-1" style="color:rgb(238, 238, 238)">
                            သင်တင်ထားသော total post များ</div>
                        <div class="h5 mb-0 font-weight-bold text-white">Total -{{count($totalPosts)}}  </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users" style="color: rgb(234, 236, 233); width :64px"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="border border-primary  border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <a href="" class="row no-gutters align-items-center text-decoration-none">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold  text-uppercase mb-1" style="color:rgb(238, 238, 238)">
                            Approved ရထားသော Post များ</div>
                        <div class="h5 mb-0 font-weight-bold text-white">Total -{{count($approvedPosts)}}  </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users" style="color: rgb(234, 236, 233); width :64px"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="border border-primary  border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <a href="" class="row no-gutters align-items-center text-decoration-none">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold  text-uppercase mb-1" style="color:rgb(238, 238, 238)">
                            Reject ထိထားသော Post များ</div>
                        <div class="h5 mb-0 font-weight-bold text-white">Total -{{count($rejectPosts)}}  </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users" style="color: rgb(234, 236, 233); width :64px"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4 ">
        <div class="border border-primary  border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <a href="" class="row no-gutters align-items-center text-decoration-none">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold  text-uppercase mb-1" style="color:rgb(238, 238, 238)">
                            သင့်ကိုပေးထားသော Review များ</div>
                        <div class="h5 mb-0 font-weight-bold text-white">Total -{{count($reviews)}}  </div>
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

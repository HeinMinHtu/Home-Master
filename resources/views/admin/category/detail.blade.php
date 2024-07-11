@extends('admin.master')
@section('content')
    <div class="page-wrapper mt-0">
        <div class="card bg-dark text-white">
            <img class="w-100" src="{{ asset('ui-images/1.png') }}" alt="Card image"
                style="height: 640px; filter: blur(10px); object-fit: cover;">
            <div class="card-img-overlay">
               <div class="container">
                <div class=" row align-items-center card p-4  mb-5">

                    <div class="col-md-6 mb-3" data-aos="fade-left" data-bs-toggle="collapse" data-aos="zoom-in-right"
                        data-aos-duration="1000" data-aos-delay="200" data-aos-offset="50">
                        <img src="{{ asset('storage/images/' . $category->image) }}" style="height: 300px;width:100%"
                            class="img-fluid rounded custombox shadow" alt="About Us Image">
                    </div>
                    <div class="col-md-6" data-aos="fade-left" data-bs-toggle="collapse" data-aos="zoom-in-right"
                        data-aos-duration="1000" data-aos-delay="200" data-aos-offset="50">
                        <h4 class="fw-bold text-decoration-none mb-2 " style="color:rgb(26, 4, 66)">{{ $category->name }}
                        </h4>

                        <ul class="text-sm" style="text-align: justify; font-size: 1rem; color:  rgb(27, 7, 63)"
                            data-aos="fade-right" data-aos="zoom-in-right" data-aos-duration="1000" data-aos-delay="400"
                            data-aos-offset="50">
                            <li>{{ $category->description }} </li>



                        </ul>

                    </div>
                </div>
                <a href="{{route('admin.service.category.list')}}" class="btn btn-sm wbtn ">Back</a>
               </div>


            </div>
        </div>

        <hr class="line mt-4">
    @endsection

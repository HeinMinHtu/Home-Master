@extends('service.master')
@section('content')
    <div class="page-wrapper mt-0 ">
        <div class="card  bg-dark text-white">
            <img class="w-100" src="{{ asset('ui-images/1.png') }}" alt="Card image"
                style="height: 640px; filter: blur(50px); object-fit: cover;">
            <div class="card-img-overlay">
                <!-- Page Content -->
                <div class="content container-fluid">
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="page-header">
                            <div class="row">
                                <div class="col-11">
                                    <div class="d-flex jusitfy-content-center gap-3">

                                        <div class="">
                                            <h4
                                                class="page-title text-decoration-none text-white mt-2 p-3 border-bottom border-primary hover-grow-card">
                                                Reviews</h4>
                                        </div>
                                        <div class=""></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="row align-items-center">


                        </div>
                    </div>





                    @if ($reviews->isEmpty())
                        <p class="text-danger fw-bold border p-2 rounded text-center my-5">No Reviews has found ! </p>
                    @else
                        <table class="custom-table  border-success table-hover">
                            <thead class=" border-success">
                                <tr>
                                    <th>စဉ်</th>
                                    <th>Review ပေးသူအမည်</th>
                                    <th>ပေးခဲ့သောစာသား</th>
                                    <th>အချိန်</th>

                                </tr>
                            </thead>
                            <tbody class=" border-success">
                                @php
                                    $offset = ($reviews->currentPage() - 1) * $reviews->perPage();
                                @endphp
                                @foreach ($reviews as $review)
                                    <tr>
                                        <td>{{ $offset + $loop->iteration }}</td>

                                        <td >
                                            {{ $review->user->name }}
                                        </td>
                                        <td>{{ $review->review_text }}</td>
                                        <td >
                                            {{ $review->created_at }}
                                        </td>




                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row mt-2">
                            <div class="col-12 d-flex justify-content-center custom-pagination pagination">
                                {{ $reviews->links() }}
                            </div>
                        </div>
                </div>
            </div>
            @endif
        @endsection


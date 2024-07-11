@extends('admin.master')

@section('content')
    <div class="page-wrapper mt-0">
        <div class="card bg-dark text-white">
            <img class="w-100" src="{{ asset('ui-images/1.png') }}" alt="Card image"
                style="height: 640px; filter: blur(90px); object-fit: cover;">
            <div class="card-img-overlay">
                <!-- Page Content -->
                <div class="content container-fluid">
                    <!-- Page Header -->
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-11">
                                <div class="d-flex  ">

                                    <h4
                                        class="page-title text-decoration-none text-white mt-2 p-3 border-bottom border-primary hover-grow-card">
                                        <span><a href="{{ url()->previous() }}"><i
                                                    class="fas fa-arrow-left fa-lg"></i></a></span>
                                        Booking
                                    </h4>



                                </div>
                            </div>
                        </div>
                    </div>


                    <table class="custom-table border-success table-hover">
                        <thead class="border-success">
                            <tr>
                                <th style="font-size: 12px;">စဉ်</th>
                                <th style="font-size: 12px;">ရယူလိုသူအမည်</th>
                                <th style="font-size: 12px;">လိပ်စာ</th>
                                <th style="font-size: 12px;">ရယူလိုသူဖုန်းနပါတ်</th>
                                <th style="font-size: 12px;">၀န်ဆောင်မှုပေးရမည့်ရက်</th>
                                <th style="font-size: 12px;">၀န်ဆောင်မှုအမျိုးအစား</th>
                                <th style="font-size: 12px;">လုပ်ဆောင်မှု အခြေအနေ</th>
                                <th style="font-size: 12px;">၀န်ဆောင်မှုအပ်ထားသူအမည်</th>
                                <th style="font-size: 12px;">၀န်ဆောင်မှုအပ်ထားသူဖုန်းနပါတ်</th>
                            </tr>
                        </thead>
                        <tbody class="border-success">

                            @foreach ($bookings as $key => $booking)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td><a href="{{route('admin.customer.detail',$booking->user->id)}}" class="text-decoration-none text-white"> {{$booking->user->name }}</a></td>

                                    <td>{{ $booking->address }}</td>
                                    <td>{{ $booking->user->phone }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->booking_time)->format('Y-m-d') }}</td>
                                    <td>{{ $booking->post->category->name }}</td>

                                    <td>
                                        @if ($booking->status == 'request')
                                            <p style="color:yellow">၀န်ဆောင်မှုရယူရန်စောင့်ဆိုင်းနေသည်</p>
                                        @elseif ($booking->status == 'reject')
                                            <p style="color:rgb(231, 164, 228)"> ၀န်ဆောင်မှုပေးသူကငြင်းထားပါသည်</p>
                                        @elseif($booking->status == 'comfirm')
                                            <p style="color:rgb(248, 248, 248)"> ၀န်ဆောင်မှုပေးသူကလက်ခံထားပါသည်</p>
                                        @endif
                                    </td>
                                    <td><a href="{{route('admin.customer.detail',$booking->post->user->id)}}" class="text-decoration-none text-white"> {{$booking->post->user->name}}</a></td>
                                    <td>{{$booking->post->user->phone}}</td>


                                </tr>
                            @endforeach
                        </tbody>
                        <div class="row mt-2">
                            <div class="col-12 d-flex justify-content-center custom-pagination pagination">
                                {{$bookings->links() }}
                            </div>
                        </div>
                    </table>
                    <div class="row mt-2">

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

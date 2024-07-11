@extends('service.master')

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
                                        class="page-title text-decoration-none text-white mt-2 p-3 border-bottom border-primary hover-grow-card"> <span><a href="{{url()->previous()}}"><i class="fas fa-arrow-left fa-lg"></i></a></span>
                                        Booking
                                    </h4>



                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($bookings->isEmpty())
                        <p class="text-danger fw-bold border p-2 rounded text-center my-5">No Booking has been found!<a href="{{route('service.post.list')}}">Back</a></p>
                    @else
                        <table class="custom-table border-success table-hover">
                            <thead class="border-success">
                                <tr>
                                    <th>စဉ်</th>
                                    <th>အပ်သူအမည်</th>
                                    <th>လိပ်စာ</th>
                                    <th>ဖုန်းနပါတ်</th>
                                    <th>၀န်ဆောင်မှုပေးရမည့်ရက်</th>
                                    <th>၀န်ဆောင်မှုအမျိုးအစား</th>
                                    <th>Status</th>
                                    <th>Manage</th>
                                    <th>Trash</th>
                                </tr>
                            </thead>
                            <tbody class="border-success">

                                @foreach ($bookings as $key => $booking)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $booking->user->name }}</td>
                                        <td>{{ $booking->address }}</td>
                                        <td>{{ $booking->user->phone }}</td>
                                        <td>{{ \Carbon\Carbon::parse($booking->booking_time)->format('Y-m-d') }}</td>
                                        <td>{{ $booking->post->category->name }}</td>

                                        <td>
                                            @if ($booking->status == 'request')
                                                <p style="color:yellow">Booking တင်ထားသည်</p>
                                            @elseif ($booking->status == 'reject')
                                            <p style="color:rgb(231, 164, 228)"> Booking ငြင်းထားပါသညိ</p>
                                            @elseif($booking->status == 'comfirm')
                                            <p style="color:rgb(248, 248, 248)">  Booking လက်ခံလိုက်ပါပီ</p>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <div class="row">
                                                <div class="col">
                                                    <form action="{{route('booking.accept',$booking->id)}}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('put')
                                                        <button type="submit" class="btn btn-sm btn-success">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col">
                                                    <form action="{{route('booking.reject',$booking->id)}}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('put')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fas fa-times"></i></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <form action="{{route('service.booking.Delete',$booking->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Booking ကိုဖျက်ရန်သေချာလား???')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>


                                        </td>
                                    </tr>
                               @endforeach
                            </tbody>
                        </table>
                        <div class="row mt-2">

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

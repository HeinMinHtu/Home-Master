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
                                                POST</h4>
                                        </div>
                                        <div class=""></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="row align-items-center">

                            <div class="col-auto float-right ml-auto">
                                <a href="{{ route('service.post.create') }}" class="btn add-btn wbtn text-white"><i
                                        class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>





                    @if ($posts->isEmpty())
                        <p class="text-danger fw-bold border p-2 rounded text-center my-5">No Posts has found ! <a
                                href="{{ route('service.post.create') }}" class="text-decoration-underline"> Click here to
                                create</a></p>
                    @else
                        <table class="custom-table  border-success table-hover">
                            <thead class=" border-success">
                                <tr>
                                    <th>စဉ်</th>
                                    <th>ပုံ</th>
                                    <th>ခေါင်းစဉ်</th>
                                    <th>စာသား</th>
                                    <th>Fee</th>
                                    <th>Status</th>

                                    <th>Actions</th>

                                    <th>Booking</th>
                                </tr>
                            </thead>
                            <tbody class=" border-success">
                                @php
                                    $offset = ($posts->currentPage() - 1) * $posts->perPage();
                                @endphp
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $offset + $loop->iteration }}</td>
                                        <td class="text-white">
                                            <img src="{{ asset('storage/images/' . $post->image) }}" class="rounded"
                                                style="width: 80px; height:80px; object-fit:cover">
                                        </td>
                                        <td style="font-size: 0.7rem; width: 20%; word-wrap: break-word;">{{ $post->category->name }}</td>
                                        <td style="font-size: 0.7rem; width: 20%; word-wrap: break-word;">
                                            {{ $post->description }}
                                        </td>
                                        <td>{{ $post->price }}</td>
                                        <td>
                                            @if ($post->status == 'accept')
                                                <span style="color: rgb(98, 218, 226);">လက်ခံထားပါသည်</span>
                                            @elseif ($post->status == 'reject')
                                                <span style="color: red;">ပယ်ချထားပါသည်</span>
                                            @elseif ($post->status == 'pending')
                                                <span style="color: yellow;">စောင့်ဆိုင်းနေသည်</span>
                                            @else
                                                {{ $post->status }}
                                            @endif
                                        </td>


                                        <td>
                                            <div class="row justify-center">
                                                <div class="col">
                                                    <!-- Delete Form -->
                                                    <form action="{{ route('service.post.delete', $post->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')

                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>

                                                <div class="col">
                                                    <!-- Edit Link -->
                                                    <a href="{{ route('service.post.edit', $post->id) }}" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td><a href="{{route('service.post.booking.list',$post->id)}}" class="btn btn-sm btn-success"><i class="fas fa-calendar-check"></i>
                                        </a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row mt-2">
                            <div class="col-12 d-flex justify-content-center custom-pagination pagination">
                                {{ $posts->links() }}
                            </div>
                        </div>
                </div>
            </div>
            @endif
        @endsection

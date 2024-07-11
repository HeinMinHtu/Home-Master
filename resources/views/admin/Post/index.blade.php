@extends('admin.master')
@section('content')
    <div class="page-wrapper mt-0">
        <div class="card bg-dark text-white">
            <img class="w-100" src="{{ asset('ui-images/1.png') }}" alt="Card image"
                style="height: 700px; filter: blur(50px); object-fit: cover;">
            <div class="card-img-overlay">
                <!-- Page Content -->
                <div class="content container-fluid">
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="col-2">
                            <h4
                                class="page-title text-decoration-none text-white  p-3 border-bottom border-primary hover-grow-card">
                                <span><a href="{{ url()->previous() }}"><i class="fas fa-arrow-left fa-lg"></i></a></span>
                               Post
                            </h4>
                        </div>

                    </div>


                    <table class="custom-table border-success ">
                        <thead class="border-success">
                            <tr>
                                <th>စဉ်</th>
                                <th>ပုံ</th>
                                <th>တင်သူ</th>
                                <th>Role</th>
                                <th>ခေါင်းစဉ်</th>
                                <th>စာသား</th>
                                <th>Fee</th>
                                <th>View</th>
                                <th>Status</th>

                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="border-success">
                            @php
                                $offset = ($posts->currentPage() - 1) * $posts->perPage();
                            @endphp
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $offset + $loop->iteration }}</td>
                                    <td class="text-white">
                                        <img src="{{ asset('storage/images/' . $post->image) }}" class="rounded"
                                            style="width: 80px; height: 80px; object-fit: cover">
                                    </td>
                                    <td><a href="{{route('admin.customer.detail',$post->user->id)}}" class="text-decoration-none text-white">{{$post->user->name }}</a></td>
                                    <td>{{ $post->user->role }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>{{ strlen($post->description) > 100 ? substr($post->description, 0, 100) . '...' : $post->description }}
                                    </td>
                                    <td>{{ $post->price }}</td>
                                    <th><a href="{{ route('admin.post.detail', $post->id) }}"> <i class="fas fa-eye"
                                                style="color: white"></i></a></th>
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
                                    <td class="text-right">
                                        <div class="d-flex justify-content-center">
                                            <form action="{{ route('admin.post.accept', $post->id) }}" method="POST"
                                                class="d-inline mx-1">
                                                @csrf
                                                @method('put')
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>

                                            <form action="{{ route('admin.post.reject', $post->id) }}" method="POST"
                                                class="d-inline mx-1">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
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
        </div>
    </div>
@endsection

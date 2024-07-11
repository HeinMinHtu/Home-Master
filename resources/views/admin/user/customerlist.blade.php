@extends('admin.master')
@section('content')
<div class="page-wrapper  mt-0">
    <div class="card  bg-dark text-white">
        <img class="w-100" src="{{asset('ui-images/1.png')}}" alt="Card image" style="height: auto; filter: blur(90px); object-fit: cover;">
        <div class="card-img-overlay">
            <!-- Page Content -->
            <div class="content container-fluid">
                <div class="page-header">


                </div>
                @if ($users->isEmpty())
                    <p class="text-danger fw-bold border p-2 rounded text-center my-5">No news has found! <a href="" class="text-decoration-underline"> Click here to create</a></p>
                @else
                    <div class="">
                        <table class="custom-table  border-success  table-hover table-striped">
                            <thead class="">
                                <tr >
                                    <th class="text-white">စဉ်</th>
                                    <th class="text-white">ပုံ</th>
                                    <th class="text-white">အမည်</th>
                                    <th class="text-white">အီးမေး</th>
                                    <th class="text-white">ဖုန်းနံပါတ်</th>
                                    <th class="text-white">Role</th>
                                    <th class="text-white">Action</th>
                                    <th class="text-white">Edit</th>


                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $offset = ($users->currentPage() - 1) * $users->perPage();
                                @endphp
                                @foreach ($users as $user)
                                <tr>
                                    <td class="text-white"  class="text-muted">{{ $offset + $loop->iteration }}</td>
                                    <td class="text-white">
                                        <img src="{{ asset('storage/images/'.$user->image) }}" class="rounded" style="width: 80px; height:80px; object-fit:cover">
                                    </td>

                                    <td class="text-white">{{$user->name}}</td>
                                    <td class="text-white">{{$user->email}}</td>
                                    <td class="text-white">{{$user->phone}}</td>
                                    <td class="text-white">
                                        @if($user->role=="user")
                                        အသုံးပြုသူ
                                        @else
                                        ၀န်ဆောင်မှုပေးသူ
                                        @endif
                                    </td>

                                    <td class="text-mwhite">
                                        <form action="{{route('admin.customer.delete',$user->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="{{route('admin.customer.detail',$user->id)}}" class="btn btn-sm btn-primary">View</a>
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash"></i></button>
                                            @if($user->role==="user")
                                            <a href="{{route('admin.cust.review.list',$user->id)}}" class=" p-1 border-bottom  text-white border-success hover-grow-card text-decoration-none">Review</a>
                                            @endif
                                        </form>
                                    </td>
                                    <td><a href="{{route('admin.user.profile.edit',$user->id)}}"><i class="fas fa-pencil-alt"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                <div class="row mt-2">
                    <div class="col-12 d-flex justify-content-center custom-pagination pagination">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

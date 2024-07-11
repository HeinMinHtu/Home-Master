@extends('admin.master')

@section('content')
<div class="page-wrapper mt-0">
    <div class="card bg-dark text-white">
        <img class="w-100" src="{{ asset('ui-images/1.png') }}" alt="Card image" style="height: 780px; filter: blur(90px); object-fit: cover;">
        <div class="card-img-overlay">
            <!-- Page Content -->
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-11">

                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-auto float-right ml-auto">
                            <a href="{{ route('admin.service.category.create') }}" class="btn add-btn wbtn text-white">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>

                @if ($categories->isEmpty())
                <p class="text-danger fw-bold border p-2 rounded text-center my-5">No Service categories found! <a href="{{ route('admin.service.category.create') }}" class="text-decoration-underline">Click here to create</a></p>
                @else
                <table class="custom-table border-success table-hover">
                    <thead class="border-success">
                        <tr>
                            <th>စဉ်</th>
                            <th>ပုံ</th>
                            <th>Serviceကဏ္ဍ ခေါင်းစဉ်</th>
                            <th>ရှင်းပြချက်</th>
                            <th>View</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="border-success">
                        @php
                        $offset = ($categories->currentPage() - 1) * $categories->perPage();
                        @endphp
                        @foreach ($categories as  $category)
                        <tr>
                            <td>{{ $offset + $loop->iteration }}</td>
                            <td class="text-white">
                                <img src="{{ asset('storage/images/' . $category->image) }}" class="rounded" style="width: 80px; height:80px; object-fit:cover">
                            </td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td><a href="{{route('admin.service.detail',$category->id)}}"><i class="fas fa-eye" style="color:wheat"></i></a></td>
                            <td>
                                <form action="{{ route('admin.service.category.delete', $category->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('admin.service.category.edit',$category->id)}}" ><i class="fas fa-pencil-alt"></i></a>
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
                <div class="row mt-2">
                    <div class="col-12 d-flex justify-content-center custom-pagination pagination">
                        {{$categories->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

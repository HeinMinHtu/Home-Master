<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title>Home Service</title>

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
    <link href="{{asset('admin-assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('admin-assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>

    <style>




        .profileimg{

                width: 50%;
                border-radius: 50%;
                margin: 0 auto;
                box-shadow: 3px 3px 3px rgb(156, 255, 27);
        }

       .wbtn{
        background-color: rgb(5, 4, 46);
       }


    .custom-table {
    background-color: transparent;
    width: 100%;


}
.custom-table td, .custom-table th {
    border-bottom: 1px solid #0a5c70; /* Add bottom border to each td and th */
    padding: 10px; /* Add padding for cell content */
}
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav wbtn sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa fa-home"></i>

                </div>
                <div class="sidebar-brand-text mx-3">၀န်ဆောင်မှုပေးသူ <sup class="text-lowercase"></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->


                <li class="nav-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('service.profie.index')}}" >

                    @if (auth()->user()->image)
                    <img class="img-profile rounded-circle object-fit-cover" style="height: 30px;wigth:20px"
                    src="{{asset('storage/images/'. Auth::user()->image)}}">
                    @endif
                    <span>{{Auth::user()->name}}</span>

                </a>
                </li>

                <li class="nav-item {{ request()->routeIs('service.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('service.index')}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>ပင်မ စာမျက်နှာ</span>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('service.post.list') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('service.post.list')}}">
                        <i class="fa-solid fa-users-line"></i>
                        <span>ပိုစ့်တင်ရန်</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('service.booking.all') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('service.booking.all')}}">
                        <i class="fa-solid fa-users-line"></i>
                        <span>၀န်ဆောင်မှု တောင်းဆိုမှု</span>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('service.review.list') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('service.review.list')}}">
                        <i class="fa-brands fa-imdb"></i>
                        <span>သုံးသပ်ချက်ပေးသူများ</span>
                    </a>
                </li>



                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('home')}}">
                        <i class="fa-brands fa-imdb"></i>
                        <span>NewFeed</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('service.profie.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('service.profie.index')}}">
                        <i class="fa-solid fa-users-line"></i>
                        <span>မိမိ့အကောင့်</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('service.password.edit') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('service.password.edit')}}">
                        <i class="fa-solid fa-users-line"></i>
                        <span>လျှိုဝှက်နံပါတ်ပြင်ဆင်ရန်</span>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('logout') ? 'active' : '' }}">
                    <a class="nav-link" href="#" onclick="confirmLogout(event)">
                        <i class="fa-brands fa-imdb"></i>
                        <span>အကောင့်ထွက်ရန်</span>
                    </a>
                </li>

                <script>
                    function confirmLogout(event) {
                        event.preventDefault();

                        if (confirm('Are you sure you want to logout?')) {
                            window.location.href = '{{ route('logout') }}';
                        }
                    }
                </script>










            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                {{-- <nav class="navbar navbar-expand navbar-light  topbar mb-1 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b>{{Auth::user()->name}}</b></span>
                                @if (auth()->user()->image)
                                <img class="img-profile rounded-circle object-fit-cover"
                                src="{{asset('storage/images/'. Auth::user()->image)}}">
                                @endif
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('service.profie.index')}}">

                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-white"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{route('service.password.edit')}}">
                                    <span style="color: red;">
                                    <i class="fas fa-fw fa-cog mr-2"></i>
                                </span>
                                    Change Password
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="return confirm('Are you sure you want to logout?');">
                                    <span style="color: red;">
                                        <i class="as fa-sign-out-alt mr-2"></i>
                                    </span>
                                    Logout
                                </a>

                        </li>

                    </ul>

                </nav> --}}
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="">

                    @yield('content')


                </div>

                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto ">
                        Computer University FinalYear Thesis Project
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('admin-assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('admin-asset/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('admin-assets/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('admin-assets/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admin-assets/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('admin-assets/js/demo/chart-pie-demo.js')}}"></script>


    {{-- bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>


    <script>
        // sweet alert
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        @if (Session('success'))
            Toast.fire({
                icon: 'success',
                title: "{{ session('success') }}"
            })
        @endif

        // add active on nav-items
        $(document).ready(function () {
            const currentUrl = window.location.href;

            $('.nav-item').each(function () {
                const route = $(this).data('route');
                if (currentUrl.startsWith(route)) {
                    $(this).addClass('active');
                }
            });
        });
        @if (session('error'))
    Toast.fire({
        icon: 'error',
        title: "{{ session('error') }}"
    });
    @endif
    </script>

</body>

</html>

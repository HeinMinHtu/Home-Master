<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Home-Master</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('asset/css/bootstrap.css')}}" />
  <!-- font awesome style -->
  <link rel="stylesheet" type="text/css" href="{{asset('asset/css/font-awesome.min.css')}}" />

  <!-- Custom styles for this template -->
  <link href="{{asset('asset/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('asset/css/responsive.css')}}" rel="stylesheet" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    .wtext{
        color:rgb(16, 16, 71);
        font-weight: bold;

    }

    nav-btn{
        background-color: rgb(16, 16, 71)
    }
    .wborder{
        border: 2px solid black;
        box-shadow: 10px 8px 10px rgba(14, 0, 10, 0.1);
    }
    .fixed-top {
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 1030;
}

  .custom_nav-container {
    padding: 13px;
    background-color: rgba(243, 243, 243, 0.7); /* Adjust the alpha (opacity) value as needed */
    backdrop-filter: blur(2px); /* Optional: Adds a blur effect */
  }

  .custom_nav-container .nav-link {
    color: white; /* Text color for links */
  }
 .wbtn{
    background-color: rgb(11, 11, 80)
 }
  </style>

</head>


<body>
  <div class="hero_area">
    <!-- header section starts -->
    <header class="header_section">

      <div class="header_bottom">
        <div class="container-fluid fixed-top">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand wtext  " href="">
              <span>
                Home Service
              </span>
              <img src="{{asset('vv/images/home.png')}}" style="width: 40px;height:40px" ></img>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                      <a href="{{ route('home') }}" class="nav-link wtext">ပင်မစာမျက်နှာ <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item {{ Request::is('service') ? 'active' : '' }}">
                      <a href="{{ route('service') }}" class="nav-link wtext">၀န်ဆောင်မှု</a>
                    </li>

                    <!-- Add other menu items with dynamic active class -->

                    @if (Auth::check())
                      <li class="nav-item {{ Request::is('newfeed.posts') ? 'active' : '' }}">
                        <a href="{{ route('newfeed.posts') }}" class="nav-link wtext">ပိုစ့်များ</a>
                      </li>
                      <li class="nav-item {{ Request::is('ui.serviceProvider.list') ? 'active' : '' }}">
                        <a href="{{ route('ui.serviceProvider.list') }}" class="nav-link wtext">၀န်ဆောင်မှုပေးသူများ</a>
                      </li>
                    @endif


                    <!-- Add other menu items with dynamic active class -->
                   @if (Auth::check())
                   @if (Auth::user()->role == 'user')

                   <li class="nav-item {{ Request::is('user/history') ? 'active' : '' }}">
                    <a href="{{ route('user.history') }}" class="nav-link wtext">History</a>
                  </li>

                   @endif

                   @endif


                    @if (Auth::check())
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle wtext" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('storage/images/' . Auth::user()->image) }}" alt="Contact" class="rounded-circle" style="width: 30px; height: 30px; vertical-align: middle;"> {{ Auth::user()->name }}
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <!-- Dropdown menu links based on user role -->


                        <a class="dropdown-item" href="{{ Auth::user()->role == 'admin' ? route('admin.profile.index') : (Auth::user()->role == 'service' ? route('service.profie.index') : route('user.profile')) }}">Profile</a>


                        <div class="dropdown-divider"></div>


                            <a href="{{route('logout')}}" type="submit" class="dropdown-item mt-2" onclick="return confirm('Are you sure?')">အကောင့်ထွက်ရန်</a>

                      </div>
                    </li>
                  @else

                      <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link wtext">အကောင့်၀င်ရန်</a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link wtext">အကောင့်ပြုလုပ်ရန်</a>
                      </li>


                    @endif
                    <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                        <a href="{{ route('contact') }}" class="nav-link wtext">ဆက်သွယ်ရန်</a>
                      </li>
                  </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <div style="height: 30px">

    </div>
    <div style="min-height: 550px">
      @yield('content')
    </div>

    <footer class="footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayDateYear"></span> All Rights Reserved By
          <a href="https://html.design/">HeinMinHtun</a>
        </p>
      </div>
    </footer>
    <!-- footer section -->

    <script src="{{asset('asset/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{asset('asset/js/custom.js')}}"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
    <!-- End Google Map -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    // Initialize AOS
    AOS.init({
        duration: 10000, // Global default duration (in ms)
    });

    // Toast message setup
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer);
            toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
    });

    // Display success message if session success exists
    @if (session('success'))
        Toast.fire({
            icon: 'success',
            title: "{{ session('success') }}"
        });
    @endif

    // Add active class to nav items based on current URL
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


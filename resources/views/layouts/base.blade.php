<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.ico')}}">
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/flexslider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/chosen.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/color-01.css')}}">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" integrity="sha512-WWc9iSr5tHo+AliwUnAQN1RfGK9AnpiOFbmboA0A0VJeooe69YR2rLgHw13KxF1bOSLmke+SNnLWxmZd8RTESQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.css" integrity="sha512-qveKnGrvOChbSzAdtSs8p69eoLegyh+1hwOMbmpCViIwj7rn4oJjdmMvWOuyQlTOZgTlZA0N2PXA7iA8/2TUYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
     <!-- include summernote css/js -->
     <script src="https://cdn.tiny.cloud/1/2eeo7dnh3vomnmiw9x9z22ne1zhxnw1tudot3ntghue1mjmc/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
     {{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
     <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script> --}}
     {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script> --}}
     {{-- <script src="https://cdn.tiny.cloud/1/2eeo7dnh3vomnmiw9x9z22ne1zhxnw1tudot3ntghue1mjmc/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
        

    <style>
        .wrap-pagination-info .pagination {
            padding: 0;
            margin: 0;
            margin-top: 17px;
        }

        .wrap-pagination-info .pagination li {
            display: block;
            list-style: none;
            float: left;
        }

        .wrap-pagination-info .pagination li:not(:last-child) {
            margin-right: 10px;
        }

        .wrap-pagination-info .pagination li .page-item.active {
            display: inline-block;
            color: #ffffff;
            font-size: 14px;
            line-height: 35px;
            font-weight: 700;
            text-align: center;
            min-width: 35px;
            padding: 0 5px;
            height: 35px;
        }

        .wrap-pagination-info .pagination li .page-item.next-link {
            min-width: 77px !important;
        }

        .wrap-pagination-info .pagination li .page-item:not(.active) {
            display: inline-block;
            color: #333333;
            font-size: 14px;
            line-height: 34px;
            background-color: #f5f5f5;
            text-align: center;
            min-width: 35px;
            padding: 0 5px;
            height: 35px;
            border-color: #e6e6e6;
        }

        .wrap-pagination-info .pagination li .page-item {
            border: 1px solid;
        }


        .pagination>.active>a,
        .pagination>.active>span,
        .pagination>.active>a:hover,
        .pagination>.active>span:hover,
        .pagination>.active>a:focus,
        .pagination>.active>span:focus {
            z-index: 3;
            color: #fff;
            background-color: #ff3c45 !important;
            border-color: #ff3c45 !important;
            cursor: default;
        }


    </style>
    <style>
         .user-list tbody td>img {
            position: relative;
            max-width: 50px;
            float: left;
            margin-right: 15px;
        }
         .error {
            color: red;
        }
    </style>
    @livewireStyles
    @stack('styles')
   
</head>

<body class="home-page home-01 ">
    
    <!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

    <!--header-->
    <header id="header" class="header header-style-1">
        <div class="container-fluid">
            <div class="row">
                <div class="topbar-menu-area">
                    <div class="container">
                        <div class="topbar-menu left-menu">
                            <ul>
                                <li class="menu-item">
                                    <a title="Hotline: (+123) 456 789" href="#"><span
                                            class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>
                                </li>
                            </ul>
                        </div>
                      
                        <div class="topbar-menu right-menu">
                            <ul>
                                <li class="menu-item lang-menu menu-item-has-children parent">
                                    <a title="English" href="#"><span class="img label-before"><img
                                                src="{{asset('assets/images/lang-en.png')}}"
                                                alt="lang-en"></span>English<i class="fa fa-angle-down"
                                            aria-hidden="true"></i></a>
                                    <ul class="submenu lang">
                                        <li class="menu-item"><a title="hungary" href="#"><span
                                                    class="img label-before"><img
                                                        src="{{asset('assets/images/lang-hun.png')}}"
                                                        alt="lang-hun"></span>Hungary</a></li>
                                        <li class="menu-item"><a title="german" href="#"><span
                                                    class="img label-before"><img
                                                        src="{{asset('assets/images/lang-ger.png')}}"
                                                        alt="lang-ger"></span>German</a></li>
                                        <li class="menu-item"><a title="french" href="#"><span
                                                    class="img label-before"><img
                                                        src="{{asset('assets/images/lang-fra.png')}}"
                                                        alt="lang-fre"></span>French</a></li>
                                        <li class="menu-item"><a title="canada" href="#"><span
                                                    class="img label-before"><img
                                                        src="{{asset('assets/images/lang-can.png')}}"
                                                        alt="lang-can"></span>Canada</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item menu-item-has-children parent">
                                    <a title="Dollar (USD)" href="#">Dollar (USD)<i class="fa fa-angle-down"
                                            aria-hidden="true"></i></a>
                                    <ul class="submenu curency">
                                        <li class="menu-item">
                                            <a title="Pound (GBP)" href="#">Pound (GBP)</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Euro (EUR)" href="#">Euro (EUR)</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Dollar (USD)" href="#">Dollar (USD)</a>
                                        </li>
                                    </ul>
                                </li>
                                @if (Route::has('login'))
                                @auth
                                @if(Auth::user()->role == 'admin')
                                <li class="menu-item menu-item-has-children parent">
                                    <a title="My Account( {{Auth::user()->name}} ) Admin" href="#">My Account(
                                        {{Auth::user()->name}} )<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="submenu curency">
                                        <li class="menu-item">
                                            <a title="Dashboard" href="{{route('admin.dashboard')}}">Dashboard</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Categories" href="{{route('admin.categories')}}">Categories</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Products" href="{{route('admin.products')}}">Products</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="product Attributes" href="{{route('admin.attributes')}}">Product Attributes</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Orders" href="{{route('admin.orders')}}">Orders</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Coupons" href="{{route('admin.coupons')}}">Coupons</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Home Sliders" href="{{route('admin.homeSliders')}}">Home Sliders</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Home Categories" href="{{route('admin.homeCategories')}}">Home Categories</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Home Sale Setting" href="{{route('admin.homeSaleSetting')}}">Home Sale Setting</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Contact Us" href="{{route('admin.contactus')}}">Contact Us</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="About US" href="{{route('admin.about')}}">About US</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Setting" href="{{route('admin.setting')}}">Setting</a>
                                        </li>

                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                            <li class="menu-item">
                                                @csrf
                                                <a title="logout" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();closest('form').submit();">{{ __('Log Out') }}</a>
                                            </li>
                                        </form>
                                    </ul>
                                </li>
                                @else
                                <li class="menu-item menu-item-has-children parent">
                                    <a title="My Account( {{Auth::user()->name}} ) User" href="#">My Account(
                                        {{Auth::user()->name}} )<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="submenu curency">
                                        <li class="menu-item">
                                            <a title="Dashboard" href="{{route('user.dashboard')}}">Dashboard</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Profile" href="{{route('user.profile')}}">Profile</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Orders" href="{{route('user.orders')}}">Orders</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Change Password" href="{{route('user.changePassword')}}">Change Password</a>
                                        </li>
                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                            <li class="menu-item">
                                                @csrf
                                                <a title="logout" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();closest('form').submit();">{{ __('Log Out') }}</a>
                                            </li>
                                        </form>
                                    </ul>
                                </li>
                                @endif
                                @else
                                <li class="menu-item"><a title="Register or Login" href="{{route('login')}}">Login</a>
                                </li>
                                <li class="menu-item"><a title="Register or Login"
                                        href="{{route('register')}}">Register</a></li>
                                @endauth

                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="container">
                    
                    <div class="mid-section main-info-area">

                        <div class="wrap-logo-top left-section">
                            <a href="/" class="link-to-home"><img src="{{asset('assets/images/logo-top-1.png')}}"
                                    alt="mercado"></a>
                        </div>

                        @livewire('header-search-component')
                        
                        <div class="wrap-icon right-section">

                            @livewire('admin.home-category.wish-list-count-component')
                            @livewire('admin.home-category.cart-count-component')
                           
                            
                            <div class="wrap-icon-section show-up-after-1024">
                                <a href="#" class="mobile-navigation">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="nav-section header-sticky">
                    <div class="header-nav-section">
                        <div class="container">
                            <ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info">
                                <li class="menu-item"><a href="#" class="link-term">Weekly Featured</a><span
                                        class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Hot Sale items</a><span
                                        class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Top new items</a><span
                                        class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Top Selling</a><span
                                        class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Top rated items</a><span
                                        class="nav-label hot-label">hot</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="primary-nav-section">
                        <div class="container">
                            <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu">
                                <li class="menu-item home-icon">
                                    <a href="/" class="link-term mercado-item-title"><i class="fa fa-home"
                                            aria-hidden="true"></i></a>
                                </li>
                                
                                <li class="menu-item">
                                    <a href="{{route('about-us')}}" class="link-term mercado-item-title">About Us</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{route('product.shop')}}" class="link-term mercado-item-title">Shop</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{route('product.cart')}}" class="link-term mercado-item-title">Cart</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{route('product.checkout')}}" class="link-term mercado-item-title">Checkout</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{route('contact-us')}}" class="link-term mercado-item-title">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    {{$slot}}

    <footer id="footer">
        <div class="wrap-footer-content footer-style-1">

            <div class="wrap-function-info">
                <div class="container">
                    <ul>
                        <li class="fc-info-item">
                            <i class="fa fa-truck" aria-hidden="true"></i>
                            <div class="wrap-left-info">
                                <h4 class="fc-name">Free Shipping</h4>
                                <p class="fc-desc">Free On Oder Over $99</p>
                            </div>

                        </li>
                        <li class="fc-info-item">
                            <i class="fa fa-recycle" aria-hidden="true"></i>
                            <div class="wrap-left-info">
                                <h4 class="fc-name">Guarantee</h4>
                                <p class="fc-desc">30 Days Money Back</p>
                            </div>

                        </li>
                        <li class="fc-info-item">
                            <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                            <div class="wrap-left-info">
                                <h4 class="fc-name">Safe Payment</h4>
                                <p class="fc-desc">Safe your online payment</p>
                            </div>

                        </li>
                        <li class="fc-info-item">
                            <i class="fa fa-life-ring" aria-hidden="true"></i>
                            <div class="wrap-left-info">
                                <h4 class="fc-name">Online Suport</h4>
                                <p class="fc-desc">We Have Support 24/7</p>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
            <!--End function info-->
            @livewire('footer-component')

            <div class="coppy-right-box">
                <div class="container">
                    <div class="coppy-right-item item-left">
                        <p class="coppy-right-text">Copyright © {{date('Y')}} {{env('APP_NAME')}}. All rights reserved</p>
                    </div>
                    <div class="coppy-right-item item-right">
                        <div class="wrap-nav horizontal-nav">
                            <ul>
                                <li class="menu-item"><a href="about-us.html" class="link-term">About us</a></li>
                                <li class="menu-item"><a href="privacy-policy.html" class="link-term">Privacy Policy</a>
                                </li>
                                <li class="menu-item"><a href="terms-conditions.html" class="link-term">Terms &
                                        Conditions</a></li>
                                <li class="menu-item"><a href="return-policy.html" class="link-term">Return Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
    <script src="{{asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.flexslider.js')}}"></script>
    <script src="{{asset('assets/js/chosen.jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.sticky.js')}}"></script>
    <script src="{{asset('assets/js/functions.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.js" integrity="sha512-3hZVhR3sY0kWODNQDsPtq4J0/onmTN57pZcNV2SWsn2VylVZ/g5DVWyrPdFsgcH3aMdyTABZIuOakNw8Y0RTRw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js" integrity="sha512-Y+0b10RbVUTf3Mi0EgJue0FoheNzentTMMIE2OreNbqnUPNbQj8zmjK3fs5D2WhQeGWIem2G2UkKjAL/bJ/UXQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js" integrity="sha512-T5Bneq9hePRO8JR0S/0lQ7gdW+ceLThvC80UjwkMRz+8q+4DARVZ4dqKoyENC7FcYresjfJ6ubaOgIE35irf4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        


    @livewireScripts
    
    @stack('scripts')

</body>

</html>

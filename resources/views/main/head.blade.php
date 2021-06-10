<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My awesome food store</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="{{ asset('main/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="your_website_domain/css_root/flaticon.css">

    <!-- Stripe -->

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</head>

<body>
    <div class="fixed" id="fixed">
        @if(Session::get('IncorrctPassword'))
        <div class="notification" id="cancel1" onclick="cancel(cancel1)">
            <img class="cancel" style="height:20px;" src="{{ asset('main/icons/cancel.svg')}}">
            {{Session::get('IncorrctPassword')}}
        </div>
        @endif

        @if(Session::get('success'))
        <div class="notification" id="cancel2" onclick="cancel(cancel2)">
            <img class="cancel" style="height:20px;" src="{{ asset('main/icons/cancel.svg')}}">
            {{Session::get('success')}}
        </div>
        @endif

        @if(Session::get('EmailNotRecognize'))
        <div class="notification" id="cancel3" onclick="cancel(cancel3)">
            <img class="cancel" style="height:20px;" src="{{ asset('main/icons/cancel.svg')}}">
            {{Session::get('EmailNotRecognize')}}
        </div>
        @endif

        @if(Session::get('MustLogin'))
        <div class="notification" id="cancel4" onclick="cancel(cancel4)">
            <img class="cancel" style="height:20px;" src="{{ asset('main/icons/cancel.svg')}}">
            {{Session::get('MustLogin')}}
        </div>
        @endif

        @if(session('invalidlink'))
        <div class="notification" id="cancel5" onclick="cancel(cancel5)">
            <img class="cancel" style="height:20px;" src="{{ asset('main/icons/cancel.svg')}}">
            {{session('invalidlink')}}
        </div>
        @endif

        @if(Session::get('invalidlink'))
        <div class="notification" id="cancel6" onclick="cancel(cancel6)">
            <img class="cancel" style="height:20px;" src="{{ asset('main/icons/cancel.svg')}}">
            {{Session::get('invalidlink')}}
        </div>
        @endif



        <!-- Registration Error -->
        @if(Session::get('fails'))
        <div class="notification" id="cancel9" onclick="cancel(cancel9)">
            <img class="cancel" style="height:20px;" src="{{ asset('main/icons/cancel.svg')}}">
            {{Session::get('fails')}}
        </div>
        @endif

        @isset($wrongpassword)
        <div class="notification" id="cancel10" onclick="cancel(cancel10)">
            <img class="cancel" style="height:20px;" src="{{ asset('main/icons/cancel.svg')}}">
            {{ $wrongpassword }}
        </div>
        @endisset

        @error('name')
        <div class="notification" id="cancel11" onclick="cancel(cancel11)">
            <img class="cancel" style="height:20px;" src="{{ asset('main/icons/cancel.svg')}}">
            {{$message}}
        </div>
        @enderror

        @error('email')
        <div class="notification" id="cancel12" onclick="cancel(cancel12)">
            <img class="cancel" style="height:20px;" src="{{ asset('main/icons/cancel.svg')}}">
            {{$message}}
        </div>
        @enderror

        @error('password')
        <div class="notification" id="cancel13" onclick="cancel(cancel13)">
            <img class="cancel" style="height:20px;" src="{{ asset('main/icons/cancel.svg')}}">
            {{$message}}
        </div>
        @enderror

        @error('confirmPassword')
        <div class="notification" id="cancel14" onclick="cancel(cancel14)">
            <img class="cancel" style="height:20px;" src="{{ asset('main/icons/cancel.svg')}}">
            {{$message}}
        </div>
        @enderror

        @error('price')
        <div class="notification" id="cancel14" onclick="cancel(cancel14)">
            <img class="cancel" style="height:20px;" src="{{ asset('main/icons/cancel.svg')}}">
            {{$message}}
        </div>
        @enderror

        @error('img')
        <div class="notification" id="cancel14" onclick="cancel(cancel14)">
            <img class="cancel" style="height:20px;" src="{{ asset('main/icons/cancel.svg')}}">
            {{$message}}
        </div>
        @enderror

        @error('details')
        <div class="notification" id="cancel14" onclick="cancel(cancel14)">
            <img class="cancel" style="height:20px;" src="{{ asset('main/icons/cancel.svg')}}">
            {{$message}}
        </div>
        @enderror

        @error('image')
        <div class="notification" id="cancel14" onclick="cancel(cancel14)">
            <img class="cancel" style="height:20px;" src="{{ asset('main/icons/cancel.svg')}}">
            {{$message}}
        </div>
        @enderror
        

    </div>



    <div class="main-wrapper">
        <div class="nav-background">
            <div class="mobile-logo">
                <img src="{{asset('main/images/resturant.png')}}" alt="">
            </div>
            <div class="mobile-nav">

                @if(session('LoggedUser'))
                <div class="cart">
                    <div class="flex items-center">
                        <a>Hello! - {{session('name')}}</a>
                    </div>
                </div>
                <div class="cart">
                    <div class="flex items-center">
                        <img src="{{asset('main/icons/cart-dark.svg')}}" alt="">
                        <a href="{{route('cardView')}}">0 Items - ($0.00)</a>
                    </div>
                </div>
                <div class="cart">
                    <div class="flex items-center">
                        <a href="{{ route('user.logout')}}">Logout</a>
                    </div>
                </div>

                @elseif(session('LoggedAdmin'))
                <div class="cart">
                    <div class="flex items-center">
                        <a href="#">{{session('name')}}</a>
                    </div>
                </div>
                <div class="cart">
                    <div class="flex items-center">
                        <a href="{{route('admin.dashboard')}}">Dashboard (Admin)</a>
                    </div>
                </div>
                <div class="cart">
                    <div class="flex items-center">
                        <a href="{{ route('admin.logout')}}">Logout</a>
                    </div>
                </div>
                @else
                <div class="cart">
                    <div class="flex items-center">
                        <a class="mobile-menu" onclick="login()">Log in</a>
                    </div>
                </div>
                <div class="cart">
                    <div class="flex items-center">
                        <a class="mobile-menu" onclick="signup()">Sign Up</a>
                    </div>
                </div>
                @endif

                <div class="nav-top">
                    <ul>
                        <li>
                            <a href="{{route('home')}}">Home</a>
                        </li>
                        <li>
                            <a href="{{route('about')}}">About us</a>
                        </li>
                        <li>
                            <a href="{{route('all-items')}}">Products</a>
                        </li>
                        <li>
                            <a href="{{route('blog')}}">Blog</a>
                        </li>
                        <li>
                            <a href="{{route('gallery')}}">Gallery</a>
                        </li>
                        <li>
                            <a href="{{route('services')}}">Services</a>
                        </li>
                        <li>
                            <a href="{{route('contact')}}">Contact us</a>
                        </li>
                    </ul>
                </div>
                <div class="contact flex items-center">
                    <img src="{{asset('main/icons/phone.svg')}}" alt="">
                    <div>
                        <h5>Call us: (+84) 123 456 789</h5>
                        <h6>E-mail : support@freshmeal.com</h6>
                    </div>
                </div>
                <div class="time flex items-center">
                    <img src="{{asset('main/icons/clock.svg')}}" alt="">
                    <div>
                        <h5>Working Hours:</h5>
                        <h6>Mon - Sat (8.00am - 12.00am)</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-content-wrapper">
            <div class="nav-trigger">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart">
                    <line x1="12" y1="20" x2="12" y2="10" />
                    <line x1="18" y1="20" x2="18" y2="4" />
                    <line x1="6" y1="20" x2="6" y2="16" />
                </svg>
            </div>
            <div class="site-content">
                <div class="header-stop">
                    <header class="topbar">
                        <div class="container flex justify-between items-center">

                            <div class="icons">
                                <a href="https://www.facebook.com"><img src="{{asset('main/icons/facebook.svg')}}"" alt=""></a>
                                <a href=" https://www.twitter.com"><img src="{{asset('main/icons/twitter.svg')}}" alt=""></a>
                                <a href="https://www.google.com"><img src="{{asset('main/icons/google.svg')}}" alt=""></a>
                                <a href="https://www.instagram.com"><img src="{{asset('main/icons/instagram.svg')}}" alt=""></a>
                                <a href="{{route('all-items')}}"><img src="{{asset('main/icons/search.svg')}}" alt=""></a>
                            </div>
                            <div class="auth flex items-center">
                                @if(session('LoggedUser'))
                                <div>
                                    <img src="{{asset('main/icons/cart.svg')}}" alt="">
                                    <a href="#">{{session('name')}}</a>
                                </div>
                                <span class="divider">|</span>
                                <div><a href="{{ route('user.logout')}}">Logout</a></div>
                                <span class="divider">|</span>
                                <div>
                                    <img src="{{asset('main/icons/cart.svg')}}" alt="">
                                    <a href="{{route('cardView')}}">0 Items - ($0.00)</a>
                                </div>
                                @elseif(session('LoggedAdmin'))
                                <div>

                                    <img src="./icons/cart.svg" alt="">
                                    <a href="#">{{session('LoggedAdminInfo.name')}}</a>
                                </div>
                                <span class="divider">|</span>
                                <div><a href="{{ route('admin.logout')}}">Logout</a></div>
                                <span class="divider">|</span>
                                <div>
                                    <img src="{{asset('main/icons/cart.svg')}}" alt="">
                                    <a href="{{route('admin.dashboard')}}">Dashboard (Admin)</a>
                                </div>
                                @else
                                <div>
                                    <img src="{{asset('main/icons/user-icon.svg')}}" alt="">
                                    <a onclick="login()" id="login">Log in</a>
                                </div>
                                <span class="divider">|</span>
                                <div>
                                    <img src="{{asset('main/icons/edit.svg')}}" alt="">
                                    <a onclick="signup()" id="signup">Register Now</a>
                                </div>

                                @endif

                            </div>
                        </div>
                    </header>
                    @if(session('LoggedUser'))
                    @else
                    <div class="popup" id="popup">
                        <div class="form" id="form">

                            <div class="reg-form" id="reg-form">
                                <img class="cancel" onclick="cancel('popup')" style="height:20px;" src="{{ asset('main/icons/cancel.svg')}}">
                                <h2 class="title">Registration Form</h2>
                                <form action="{{ route('user.save')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="flex justify-between input">
                                        <label class="label">Name</label>
                                        <input class="input--style-4" type="text" name="name">
                                    </div>
                                    <div class="flex justify-between input">
                                        <label class="label">Email Address</label>
                                        <input class="input--style-4" type="email" name="email">
                                    </div>
                                    <div class="flex justify-between input">
                                        <label class="label">Phone Number</label>
                                        <input class="input--style-4" type="number" name="phone">
                                    </div>
                                    <div class="flex justify-between input">
                                        <label class="label">password</label>
                                        <input class="input--style-4" type="password" name="password">
                                    </div>
                                    <div class="flex justify-between input">
                                        <label class="label">Confirm password .</label>
                                        <input class="input--style-4" type="password" name="confirmPassword">
                                    </div>
                                    <div class="flex justify-between input">
                                        <label class="label">Profile Image .</label>
                                        <input class="input--style-4" type="file" name="image">
                                    </div>
                                    <div class="input">
                                        <button class="button" type="submit"> Sign Up</button>
                                    </div>
                                </form>
                            </div>
                            <div class="log-form" id="log-form" onclick="cancel(log-form)">
                                <img class="cancel" onclick="cancel('popup')" style="height:20px;" src="{{ asset('main/icons/cancel.svg')}}">
                                <h2 class="title">login Form</h2>
                                <form action="{{ route('user.check')}}" method="Post">
                                    @csrf
                                    <div class="flex justify-between input">
                                        <label class="label">Email Address</label>
                                        <input class="input--style-4" type="email" name="email">
                                    </div>
                                    <div class="flex justify-between input">
                                        <label class="label">password</label>
                                        <input class="input--style-4" type="password" name="password">
                                    </div>
                                    <div class="input">
                                        <button id="log-button" class="button" type="submit"> Sign Up</button>
                                    </div>
                                </form>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    $(".mobile-menu").click(function() {
                                        $(".site-content-wrapper").removeClass("scaled");
                                    });
                                });

                                function login() {
                                    var x = document.getElementById("popup");

                                    if (x.style.display === "none") {
                                        x.style.display = "block";
                                        $("#log-form").show();
                                        $("#reg-form").hide();
                                    } else {
                                        x.style.display = "none";

                                    }
                                }

                                function signup() {
                                    var x = document.getElementById("popup");

                                    if (x.style.display === "none") {
                                        x.style.display = "block";
                                        $("#reg-form").show();
                                        $("#log-form").hide();
                                    } else {
                                        x.style.display = "none";

                                    }
                                }
                            </script>
                        </div>
                    </div>
                    @endif

                    <nav>
                        <div class="top">
                            <div class="container flex justify-between">
                                <div class="contact flex items-center">
                                    <img src="{{asset('main/icons/phone.svg')}}" alt="">
                                    <div>
                                        <h5>Call US: (+84) 123 456 789</h5>
                                        <h6>E-mail : support@freshmeal.com</h6>
                                    </div>
                                </div>
                                <div class="branding">
                                    <img src="{{asset('main/images/resturant.png')}}" alt="">
                                </div>
                                <div class="time flex items-center">
                                    <img src="{{asset('main/icons/clock.svg')}}" alt="">
                                    <div>
                                        <h5>Working Hours:</h5>
                                        <h6>Mon - Sat (8.00am - 12.00am)</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="navbar magic-shadow">
                            <div class="container flex justify-center">
                                <a href="{{route('home')}}" class="active">Home</a>
                                <a href="{{route('about')}}">About us</a>
                                <a href="{{route('all-items')}}">Food Items</a>
                                <a href="{{route('blog')}}">Blog</a>
                                <a href="{{route('services')}}">Services</a>
                                <a href="{{route('gallery')}}">Gallery</a>
                                <a href="{{route('contact')}}">Contact us</a>
                            </div>
                        </div>
                    </nav>
                </div>
                <script>
                    function cancel(id) {
                        var x = document.getElementById(id);
                        $(id).hide();
                        x.style.display = "none";
                    }
                </script>
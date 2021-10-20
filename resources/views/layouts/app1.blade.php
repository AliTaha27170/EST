<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>NJIB EST</title>

    <link rel="stylesheet" href="{{URL::asset('user/libs/bs4/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/libs/owl/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/libs/owl/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/libs/fa4/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/css/styles.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/css/navbar.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/libs/sider/css/sidebar.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/libs/nice_number/jquery.nice-number.min.css')}}">

    <script src="{{URL::asset('user/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{URL::asset('user/libs/nice_number/jquery.nice-number.min.js')}}"></script>
    <script src="{{URL::asset('user/libs/bs4/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('user/libs/owl/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('user/libs/jquery_cookie/jquery.cookie.js')}}"></script>
</head>

<body>

    <div class="sidebar" id="sidebar">
        <div class="close">
            <a href="#" id="sidebar-close" class="btn-close fa fa-close"></a>
        </div>
        <div class="content">
            <ul>
                <li>
                    <div class="search-nav">
                        <input type="text" placeholder="Find everything..">
                        <button class="fa fa-search"></button>

                    </div>
                </li>
                <li><a href="#">Home</a></li>
                <li><a href="#">Food Products</a></li>
                <li><a href="#">Cookbooks</a></li>
                <hr>
                <li><a data-toggle="modal" data-target="#login-modal">Login</a></li>
                <li><a href="#">Create Account</a></li>
            </ul>
        </div>
    </div>
    <nav class="m-nav m-nav-scrol">
        <button id="open-left"><span class="fa fa-bars"></span></button>

        <img src="{{URL::asset('user/img/logow.png')}}" alt="">
        <ul class="user-ul">
            <li>
                <div class="search-nav">
                    <input type="text" placeholder="Find everything..">
                    <button class="fa fa-search"></button>
                </div>
            </li>
            <li class="account-nav">
                <a><span class="fa fa-user-o"></span>&nbsp;&nbsp;Account</a>

                <div class="nav-drop">
                    <ul>
                        <li><a data-toggle="modal" data-target="#login-modal">Login</a></li>
                        <li><a href="#">Create Account</a></li>
                    </ul>
                </div>

            </li>
            <li>
                <a href="/Cart.html"><span class="fa fa-shopping-cart"></span>&nbsp;&nbsp;15</a>
            </li>

        </ul>
        <ul class="links-ul">
            <li class="active-nav">
                <a href="{{url('/')}}">Home</a>
            </li>
            <li>
                <a href="{{url('products')}}">Food Products</a>
            </li>
            <li>
                <a href="#">Cookbooks</a>
            </li>

        </ul>
    </nav>

    <!-- Login Modal -->
    <div class="modal fade" id="login-modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- login form -->
                <form action="">
                    <div class="modal-header">
                        <h3 style="display: block; margin: auto">Login</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body" style="text-align: center">
                        <p>
                            <input class="input1" type="email" name="" placeholder="Email Address">
                        </p>
                        <p>
                            <input class="input1" type="password" name="" placeholder="Password">
                        </p>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="mbtn5">Login</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @yield('content')

    <footer class="row">
        <div class="col-sm-4">
            <img src="/img/logo.png" alt="">
        </div>
        <div class="col-sm-4">
            <div><a href="#">Terms & Conditions</a></div>
            <div><a href="#">About Us</a></div>
        </div>
        <div class="col-sm-4">
            <div><span class="fa fa-map-marker"></span> Location here, City Here 522AD</div>
            <div><span class="fa fa-phone"></span> +999 999 999 999</div>
        </div>
    </footer>
    <script src="libs/sider/js/sidebar.js"></script>

    <script>
        $(document).ready(function () {
            $(".top-slider").owlCarousel({
                loop: true,
                items: 1,
                nav: true
            })

            $(".o-brands-parent").owlCarousel({
                loop: false,
                items: 3,
                nav: true
            })
        });

        $(window).scroll(function () {
            var a = 75;
            var pos = $(window).scrollTop();
            if (pos > a) {
                $("nav.m-nav").addClass("m-nav-scroll");
                $("nav.m-nav").find("img").attr("src", "user/img/logo.png");
            } else {
                $("nav.m-nav").removeClass("m-nav-scroll");
                $("nav.m-nav").find("img").attr("src", "user/img/logow.png");
            }
        });

        function FormAddAddress(){
            if($("#a-name").val() == ""){
                $("#address-modal").modal("show");
            }
            else{
                $(".form-a-d-btn").html("Add");
                $("#a-name").val("");
                $("#a-address").val("");
                $("#a-state").val("");
                $("#a-city").val("");
                $("#a-zipcode").val("");
                $("#a-telephone").val("");
                $("#a-fax").val("");
                $(".contact-us form .a-text-parent label .a-text").html("Add New Address!")
            }
            
        }

        function ModalAddAddress(){
            $("#a-name").val($("#a-d-name").val());
            $("#a-address").val($("#a-d-address").val());
            $("#a-state").val($("#a-d-state").val());
            $("#a-city").val($("#a-d-city").val());
            $("#a-zipcode").val($("#a-d-zipcode").val());
            $("#a-telephone").val($("#a-d-telephone").val());
            $("#a-fax").val($("#a-d-fax").val());

            $(".contact-us form .a-text-parent label .a-text").html($("#a-address").val() + ", " + $("#a-state").val() + ", " + $("#a-city").val())
            $("#address-modal").modal("hide");
            $(".form-a-d-btn").html("Remove");
        }
    </script>
 @stack('page_scripts')

</body>

</html>
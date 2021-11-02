<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>NAJIB EST.</title>
    <link rel="icon" href="{{URL::asset('user/img/ico.jpg')}}">
    <script>
        var isHome = false;

    </script>
    <link rel="stylesheet" href="{{URL::asset('user/libs/bs4/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/libs/owl/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/libs/owl/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/libs/aos/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/libs/fa4/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/css/styles.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/css/navbar.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/libs/sider/css/sidebar.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/libs/nice_number/jquery.nice-number.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.6.1/font/bootstrap-icons.min.css" integrity="sha512-9a1QYep56cYgIPFq0JYfsh9xRYYmPBxKaD6/ZfVAtplQ6y9ZUSk7GxgC2dmwtxK9T2cGQOxCV6J2Ll51nrvP2w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script src="{{URL::asset('user/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{URL::asset('user/libs/nice_number/jquery.nice-number.min.js')}}"></script>
    <script src="{{URL::asset('user/libs/bs4/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('user/libs/owl/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('user/libs/jquery_cookie/jquery.cookie.js')}}"></script>


</head>

<body>
        <!-- Scroll To TOp Button -->
        <button id="scroll_top"><i class="fas fa-arrow-up"></i></button>
        <!-- Scroll To TOp Button -->
    <!-- <nav class="m-nav m-nav-scrol">
        <button id="open-left"><span class="fa fa-bars"></span></button>
        <a href="/">
            <img src="{{URL::asset('user/img/logow.png')}}" alt="">
            <div class="brand-text">
                <label>NAJIB EST.</label>
                <p> Prosperity & Development Economical Group</p>
            </div>

        </a>

        <ul class="user-ul">
            <li>
                <div class="search-nav">
                    <input id="search_text" class="search_text" type="text" placeholder="Find everything..">
                    <button class="fa fa-search"></button>
                </div>
                <div class="search-drop">

                    <a href="#">
                        <div class="search-item">

                        </div>
                    </a>
                </div>
            </li>
            <li class="ship-to">
                <p><span class="fa fa-map-marker"></span> Shipping To</p>
                <p>{{$position->regionName}}</p>
            </li>
            <li class="account-nav">
                @if (Auth::user())
                <a><span class="fa fa-user-o"></span>&nbsp;&nbsp;{{Auth::user()->name}}</a>
                <div class="nav-drop">
                    <ul>
                        {{-- <li><a data-toggle="modal" data-target="#login-modal">Profile</a></li> --}}
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="mb-control"
                                data-box="#mb-signout">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        <li>
                            <a href="{{url('business/user/'.Auth::user()->id)}}">Profile</a>
                        </li>
                    </ul>
                </div>
                @else
                <a><span class="fa fa-user-o"></span>&nbsp;&nbsp;Account</a>

                <div class="nav-drop" style="right: 0;">
                    <ul>
                        <li><a data-toggle="modal" data-target="#login-modal">Login</a></li>
                        <li><a href="{{route('business.create')}}">Create Account</a></li>
                    </ul>
                </div>
                @endif
            </li>
            <li>
                @if (Auth::user())
                <a href="http://wenfeeusa.americommerce.com/store/shopcart.aspx"><span class="fa fa-shopping-cart"></span>&nbsp;&nbsp;<span id="item_count"></span></a>
                @endif
            </li>

        </ul>
        <ul class="links-ul">
            <li>
                <a class="nav1" href="{{url('/')}}">Home</a>

            </li>
            <li>
                <a href="#">Food Products</a>
                <div data="" class="nav-drop">
                    <ul>
                        @foreach($big_categories as $big_cat)
                        <li><a @if($big_cat->cat_num>0) href="{{url('products/'.$big_cat->id)}}" @else
                                data-toggle="modal" data-target="#soon-modal" href="#" @endif ><span
                                    class="fa fa-cutlery"></span>{{$big_cat->name}}</a></li>
                        
                        @endforeach
                    </ul>
                </div>
            </li>
            
            <li>
                <a href="{{url('cookbooks')}}">Cookbooks</a>
            </li>
            <li>
                <a href="{{url('productList')}}" target="_blank">Products List</a>
            </li>

        </ul>
    </nav>

    <div class="modal fade" id="soon-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h3 style="display: block; margin: auto">Coming Soon</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <p style="margin: 0; text-align: center;">
                        <span class="fa fa-clock"></span> This type of products is coming soon.
                    </p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="mbtn4" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div> -->


    <!-- New Navbar -->
    <!-- First Nab -->
    <nav id="first_nav">
    <div class="ship-to">
        <p><span class="fa fa-map-marker"></span> Shipping To <span>{{$position->regionName}}</span></p>
    </div>
            <div class="Registration">
        <a href="#">Login</a>
        <span>|</span>
        <a href="#">Register</a>
        <i class="fas fa-user User-Icon"></i>
          </div>
  </nav>
    <!-- End Of First Nab -->

      <div class="wrapper">
    <nav id="main_nav">
      <input type="checkbox" id="show-search">
      <input type="checkbox" id="show-menu">
      <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
      <div class="content">
      <div class="logo">
      <img id="logo_img" src="https://najibest.wenfee.com/user/img/logo.png" alt="">
          <a href="#">NAJIB EST.</a>
        </div>
        <ul class="links">
          <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
          <li>
            <a href="#" class="desktop-link"><i class="fas fa-utensils"></i>Food Products</a>
            <input type="checkbox" id="show-features">
            <label for="show-features"><span><i class="fas fa-utensils"></i>Food Products</span><i class="fas fa-angle-down"></i></label>
            <ul>
              <li><a href="#">Mediterranean Foods</a></li>
              <li><a href="#">Al Sham Bakery</a></li>
              <li><a href="#">American Food</a></li>
              <li><a href="#">Vegetables</a></li>
            </ul>
          </li>
          <li><a href="#"><i class="fas fa-book"></i>Cookbooks</a></li>
          <li><a href="#"><i class="fas fa-clipboard-list"></i>Products List</a></li>
        </ul>
      </div>
      <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
      <form action="#" class="search-box">
        <input type="text" placeholder="What are you looking for ?" required>
        <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
      </form>
    </nav>
  </div>
    <!-- New Navbar -->

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="close">
            <a href="#" id="sidebar-close" class="btn-close fa fa-close"></a>
        </div>
        <div class="content">
            <ul class="s-menu">
                <li>
                    <div class="search-nav">
                        <input id="search_text1" class="search_text" type="text" placeholder="Find everything..">
                        <button class="fa fa-search"></button>
                    </div>
                </li>
                <li><a href="{{url('/')}}">Home</a></li>
                <li>
                    <a>Food Products</a>
                    <ul class="sub-menu">
                        @foreach($big_categories as $big_cat)
                        <li>
                            <a @if($big_cat->cat_num>0) href="{{url('products/'.$big_cat->id)}}
                                @endif">{{$big_cat->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{url('cookbooks')}}">Cookbooks</a></li>
                <hr>
                <li><a data-toggle="modal" data-target="#login-modal">Login</a></li>
                <li><a href="{{route('business.create')}}">Create Account</a></li>
            </ul>
        </div>
    </div>


    <!-- Login Modal -->
    <div class="modal fade" id="login-modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- login form -->
                <form method="POST" id="login_form" action="">
                    @csrf
                    <div class="modal-header">
                        <h3 style="display: block; margin: auto">Login</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body" style="text-align: center">
                        <p>
                            <input class="input1" id="email" type="email" name="email" placeholder="Email Address"
                                required autofocus>
                            
                        </p>
                        <p>
                            <input class="input1" id="password" type="password" name="password" required
                                placeholder="Password">
                            <div id="error_message"></div>
                        </p>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="mbtn5"> {{ __('Login') }}</button>
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- terms Modal -->
    <div class="modal fade" id="terms-modal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h3>Terms & Condetions</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <table>
                        <tbody>

                            <tr valign="top">
                                <td class="tdterms2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Free&nbsp;delivery:</b></td>
                                <td class="tdterms">
                                    In the Washington, D.C. metro area for orders above $500.00.
                                    <br>
                                    Orders below the minimum can either be picked up from our warehouse, or a $25.00
                                    delivery charge will be added to your invoice.
                                </td>
                            </tr>
                            <tr valign="top">
                                <td class="tdterms2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Pick-up:</b></td>
                                <td class="tdterms">
                                    Orders require a 24 hour notice.
                                </td>
                            </tr>
                            <tr valign="top">
                                <td class="tdterms2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Shipping:</b></td>
                                <td class="tdterms">
                                    Goods may be lost or damaged by freight forwarders during transit. Our
                                    responsibility for damages ceases as soon as the trucker signs for it. You must
                                    file all damage claims. However, should you require any assistance we will be
                                    happy to help in any way we can.
                                </td>
                            </tr>
                            <tr valign="top">
                                <td class="tdterms2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Our&nbsp;terms:</b></td>
                                <td class="tdterms">
                                    Net 10 days.
                                    <br>
                                    Finance charge of 1.5% per month will be added to balances over 30 days old.
                                    <br>
                                    Returned checks will be assessed a $25.00 fee.
                                </td>
                            </tr>
                            <tr valign="top">
                                <td class="tdterms2">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Prices&nbsp;&amp;&nbsp;Returns:&nbsp;&nbsp;</b>
                                </td>
                                <td class="tdterms">
                                    Prices are FOB our warehouse, and are subject to change without notice.
                                    <br>
                                    All returns require prior authorization, and must be made within 5 days of
                                    receipt of merchandise.
                                </td>
                            </tr>
                            <tr valign="top">
                                <td class="tdterms2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>New&nbsp;customers:</b></td>
                                <td class="tdterms">
                                    <span class="cap-red">If you would like to open an account with us</span> please
                                    fill out the <a style="text-decoration: underline !important;"
                                        href="{{route('business.create')}}">account
                                        application</a>
                                    and fax it to us at (240) 337-6468, and your credit approval will be based upon
                                    satisfactory replies collected from your bank and references. Approved credit
                                    customers are required to pay in advance for their first order.

                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="mbtn4" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    @yield('content')
    <!-- Old Footer -->
    <!-- <footer>
        <div class="row" style="width: 100%">
           
            <div class="col-sm-3">
                <div><a data-toggle="modal" data-target="#terms-modal" href="#">Terms & Conditions</a></div>
                <div style="margin-bottom: 10px;"><a href="{{url('about')}}">About Us</a></div>
                <div style="margin-bottom: 10px;"><a href="{{url('contact/create')}}">Contact Us</a></div>
            </div>
            <div class="col-sm-3">
                <div><span class="fa fa-map-marker"></span> 7184 TROY HILL DRIVE SUIT C.
                    <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    ELKRIDGE , MD 21075 USA</div>
                <div><span class="fa fa-phone"></span> (301) 202-7905<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp (410)
                    379-2267
                </div>
            </div>
            <div class="col-sm-3">
                <div style="color:#ad011b">You Can Find Our Products</div>
                <div><a href="http://www.Shamra.Com">www.Shamra.Com</a></div>
                <div><a href="http://www.Wenfee.Com">www.Wenfee.Com</a></div>

                <div><a href="https://www.amazon.com/s?k=najib+est&qid=1554403445&ref=sr_pg_1">Amazon</a></div>

            </div>
            <div class="col-sm-3">
                <div style="color:#292b2c; display: flex; justify-content: center;">Create account to start purchase</div>
                <div style="display: flex; justify-content: center;"><a  href="{{route('business.create')}}"><button style="padding: 2px 29px; font-size: 18px;" class="mbtn3">create account</button></a></div>
                

            </div>
        </div>

    </footer> -->
    <!-- End Of Old Footer -->
    <!-- New Footer -->
  <footer id="footer">

<div class="footer-top">
  <div class="container-fluid">
    <div class="row">

      <div class="col-lg-4 col-md-6 footer-contact">
        <h3>NAJIB <span>EST.</span></h3>
        <p>
        7184 TROY HILL DRIVE SUIT C.<br>
          ELKRIDGE , MD 21075<br>
          United States <br><br>
          <strong>Phone:</strong>(410) 379-2267 , (301) 202-7905<br>
          <strong>Email:</strong>Info@Najibest.Com<br>
        </p>
      </div>

      <div class="col-lg-4 col-md-6 footer-links">
        <h4>Links</h4>
        <ul>
          <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="#">Contact Us</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="#">Terms & Conditions</a></li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-6 footer-links">
        <h4>You Can Find Our Products</h4>
        <ul>
          <li><i class="bi bi-chevron-right"></i> <a href="#">www.Shamra.Com  </a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="#">www.Wenfee.Com</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="#"></a>Amazon</li>
        </ul>
      </div>
      <div class="find-us">you can find our products in several stores or Call us to find out the nearest store and the
                        nearest distributor with our goods</div>
    </div>
  </div>
</div>
</footer>
    <!--  End Of New Footer -->



    <script src="{{URL::asset('user/libs/sider/js/sidebar.js')}}"></script>
    <script>
        $(".s-menu a").click(function () {
            $(this).next().filter("ul").slideToggle(500);
        });

    </script>
    <script>
        if (isHome) {
            $(window).scroll(function () {
                var a = 75;
                var pos = $(window).scrollTop();
                if (pos > a) {
                    $("nav.m-nav").addClass("m-nav-scroll");
                    $("nav.m-nav").find("img").first().attr("src", "{{URL::asset('user/img/logo.png')}}");
                } else {
                    $("nav.m-nav").removeClass("m-nav-scroll");
                    $("nav.m-nav").find("img").first().attr("src", "{{URL::asset('user/img/logow.png')}}");
                }
            });

        } else {
            $("nav.m-nav").addClass("m-nav-scroll");
            $("nav.m-nav").find("img").attr("src", "{{URL::asset('user/img/logo.png')}}");
        }

    </script>
    <script>
        $(document).ready(function () {

            function load_data(query) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/search/" + query,
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function (data) {
                        if (!$.isArray(data) || !data.length) {
                            item = "<div class='search-item'><a><p>No results found</p></div></a>";
                        } else {
                            var item = "";
                            $(data).each(function (i, f) {
                                var desc = f.description;
                                var url = '{{url("products")}}';
                                item +=
                                    '<form class="search_form" method="POST" action="{{url("products")}}/' +
                                    f.big_category_id + '#' +
                                    f.id + '">{{ csrf_field() }}' +
                                    "<input type='text' hidden name='cat_id' value='" + f
                                    .category_id + "'>" +
                                    " <a type='submit' onclick='parentNode.submit();'>" +
                                    "<div class='search-item'><img src='{{URL::asset('storages/images/products')}}/" +
                                    f.image + "'>" +
                                    "<div><h6>" + f.code + "</h6>" +
                                    "<p>" + $(desc).text() + "</p></div></div></a></form>";

                            });
                        }
                        $(".search-drop").html(item);
                    },
                    error: function (data) {
                        // $(".search-item").html("<img src='{{URL::asset('storages/images/products/".data.image."')}}'><div><h6>".data.code."</h5><p>".data.description."</p></div>");
                        console.log(data);
                    }
                });
            }
            $('.search_text').keyup(function () {
                var search = $(this).val();
                var searchDrop = $(".search-drop");
                if (search != '') {
                    searchDrop.show();
                    load_data(search);
                } else {
                    searchDrop.hide();
                }
            });
            var links = $('.links-ul').children().children();
            var links2 = $('.nav-drop').children().children().children();

            $.each(links, function (key, value) {
                if (value.href == document.URL) {
                    $(this).parent().addClass('active-nav');
                }
            });
            $.each(links2, function (key, value) {
                if (value.href == document.URL) {
                    $(this).parent().parent().parent().parent().addClass('active-nav');
                }
            });
        });

    </script>
    <script>
        $(document).on('submit', "form#login_form", function (e) {
            e.preventDefault();
            var data = $('#login_form').serialize();
            
            $.ajax({
                type: "post",
                url: '/check_user',
                data: data,
                // dataType: "json",
                success: function (data) {
                    if(data.data_type=="error"){
                    $('#error_message').html("<p style='color:#B71C1C;'>"+data.message+"</p>")
                    }
                    else if(data.data_type=="admin"){
                        window.location = "{{ route('administrator') }}"
                    }
                    else if(data.data_type=="user"){
                        window.location.reload();
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        
        });
    </script>
    @stack('page_scripts')
    <script src="{{URL::asset('user/libs/aos/js/aos.js')}}"></script>
    <script src="{{URL::asset('user/js/scrolltotop.js')}}"></script>
</body>
<script type="text/javascript">

    window.acOnReady = function() {
      AC.init({ storeDomain: "wenfeeusa.americommerce.com" });
  
      AC.cart.get(function(response) {
        if (response.data) {
          var c = response.data, itemCount = document.getElementById("item_count");
          itemCount.innerHTML = c.totalItemCount;
        }
      });
    };
  
  
  // ==== BEGIN AC SYSTEM CODE ====
  (function(a){var d,c,b;a.acReadyEvents=a.acReadyEvents||[];if(a.acOnReady){d=a.acOnReady;a.acReadyEvents.push(d);a.acOnReady=undefined}if(a.postScriptLoad){a.postScriptLoad();return}a.jqReady=false;a.acReady=false;a.loadScript=function(e,i){var g,h=a.document,f=h.getElementsByTagName("head")[0];g=h.createElement("script");g.async=true;g.src=e;if(i){g.onload=i;g.onreadystatechange=function(){if(!this.readyState||this.readyState=="loaded"||this.readyState=="complete"){i();g.onload=g.onreadystatechange=null;f.removeChild(g)}}}f.appendChild(g)};a.postScriptLoad=function(){if(!a.jqReady||!a.acReady){setTimeout(a.postScriptLoad,60);return}while(a.acReadyEvents.length>0){var e=a.acReadyEvents.pop();e()}};c=a.jQuery;if(c){a.jqReady=true}else{a.loadScript("https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js",function(){a.jqReady=true})}b=a.AC;if(b){a.acReady=true}else{a.loadScript("https://wenfeeusa.americommerce.com/store/inc/clientapi/ac-client-api.min.js",function(){a.acReady=true})}a.postScriptLoad()}(window));
  // ==== END AC SYSTEM CODE ====
    
  var x =document.querySelectorAll(".c-item");
  var firstNavHeight = document.querySelector("#first_nav").offsetHeight
  var mainNavHeight = document.querySelector("#main_nav").offsetHeight
  for (let i = 0 ; i < x.length ; i++)
  {
  x[i].style.height = (window.innerHeight)+"px"
  }
  </script>

</html>

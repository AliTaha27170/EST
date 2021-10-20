<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Dashboard</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{{URL::asset('css/theme-default.css')}}"/>
        <!-- EOF CSS INCLUDE -->  
        @toastr_css                                  
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="index.html">Najib Est</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="{{URL::asset('avatar.png')}}" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="{{URL::asset('avatar.png')}}" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">{{Auth::user()->name}}</div>
                            </div>
                            
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Components</li>
                    <li class="">
                        <a href="{{url('administrator')}}"><span class="fa fa-desktop"></span> <span class="xn-text">Home</span></a>                        
                    </li> 
                    <li class="xn-openable">
                        <a href=""><span class="fa fa-clone"></span> Categories</a>
                        <ul>                                    
                            <li><a href="{{url('administrator/categories/create')}}">Add category </a></li>
                            <li><a href="{{url('administrator/categories')}}"> View Categories</a></li>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href=""><span class="fa fa-hashtag"></span> Brands</a>
                        <ul>                                    
                            <li><a href="{{url('administrator/brands/create')}}">Add brand </a></li>
                            <li><a href="{{url('administrator/brands')}}"> View brands</a></li>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href=""><span class="fa fa-tags"></span> Products</a>
                        <ul>                                    
                            <li><a href="{{url('administrator/products/create')}}">Add product </a></li>
                            <li><a href="{{url('administrator/products')}}"> View products</a></li>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href=""><span class="fa fa-users"></span> Users</a>
                        <ul>                                    
                            <li><a href="{{url('administrator/business')}}">registered users</a></li>
                            <li><a href="{{url('administrator/users')}}"> approved users</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('administrator/contact')}}"><span class="fa fa-envelope"></span> Contact messages</a>
                       
                    </li>
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            <!-- PAGE CONTENT -->
            <div class="page-content">
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                   
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>  
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>                      
                    </li> 
                    <!-- END SIGN OUT -->
                                    
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                  @yield('pageBody')
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

       
                     
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="{{URL::asset('js/plugins/jquery/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/plugins/jquery/jquery-ui.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/plugins/bootstrap/bootstrap.min.js')}}"></script>        
        <!-- END PLUGINS -->
 <!-- THIS PAGE PLUGINS -->
        <script src="{{URL::asset('ckeditor/ckeditor.js')}}"></script>
        <script type='text/javascript' src="{{URL::asset('js/plugins/icheck/icheck.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>                
        <script type="text/javascript" src="{{URL::asset('js/plugins/bootstrap/bootstrap-file-input.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/plugins/bootstrap/bootstrap-select.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/plugins/tagsinput/jquery.tagsinput.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>   
        <script type="text/javascript" src="{{URL::asset('js/plugins/owl/owl.carousel.min.js')}}"></script>

        <script type="text/javascript" src="{{URL::asset('js/plugins/morris/raphael-min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/plugins/morris/morris.min.js')}}"></script>
        {{-- <script type="text/javascript" src="{{URL::asset('js/plugins/scrolltotop/scrolltopcontrol.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/plugins/rickshaw/d3.v3.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/plugins/rickshaw/rickshaw.min.js')}}"></script> --}}
        <!-- END PAGE PLUGINS -->
       
        <!-- START TEMPLATE -->
        @stack('show_user')
        <script type="text/javascript" src="{{URL::asset('js/plugins.js')}}"></script>        
        <script type="text/javascript" src="{{URL::asset('js/actions.js')}}"></script>
        {{-- <script type="text/javascript" src="{{URL::asset('js/settings.js')}}"></script> --}}
        <script type="text/javascript" src="{{URL::asset('js/demo_dashboard.js')}}"></script>
        <!-- END TEMPLATE -->

        @toastr_js
        @toastr_render

        <script>
            @if(\Session::has('success'))
                toastr.success("{{\Session::get('success')}}");
            @endif
            @if(\Session::has('error'))
                toastr.error("{{\Session::get('error')}}");
            @endif
        </script>
        
        @stack('delete')
        @stack('ckeditor')
    <!-- END SCRIPTS -->         
    </body>
</html>







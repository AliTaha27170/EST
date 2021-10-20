<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL::asset('slider/libs/fa4/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('slider/frame.css')}}">
    <title>Control</title>
    <link rel="stylesheet" href="{{URL::asset('slider/control.css')}}">
    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = false;
        
            var pusher = new Pusher('fee661f6364ba5630a1d', {
              cluster: 'eu',
              forceTLS: true
            });
        
            var channel = pusher.subscribe('my-channel');
            channel.bind('form-submitted', function(data) {
                if(data.text.constructor === Array){
                    $('.slider-item').attr('brand-id',data.text[4]);
                    $('.slider-item').attr('category-id',data.text[5]);
                    $('.slider-img').fadeOut(400)
                    .fadeIn(400).css('background-image', 'url(\'{{asset("storages/images/products/")}}/'+data.text[3] +'\')');
                    $('.ddesc').text(data.text[2]);
                    $('.dcode').html(data.text[1]);
                    
                }
                
            });
          </script>

</head>

<body>
    <div class="banner-parent">
        <img src="{{URL::asset('slider/imgs/logo.png')}}" alt="">
        <h1>Control Panel</h1>
        <img src="{{URL::asset('slider/imgs/logo.png')}}" alt="">
    </div>

    <h1 class="title">Now On Screen</h1>
    
    <div style="display: flex; justify-content: center; margin-bottom: 15px;">
        <button id="prev" class="c-btn">
            <img src="{{URL::asset('slider/imgs/angle-left.svg')}}" width="25" height="25" alt=""> &nbsp; Previous
        </button>
        <button id="restart" class="c-btn">
             Restart Slider
        </button>
        <button id="next" class="c-btn">
            Next &nbsp; <img src="{{URL::asset('slider/imgs/angle-right.svg')}}" width="25" height="25" alt="">
        </button>
    </div>
    <div class="item-parent">
        <img class="screen-img" src="{{URL::asset('slider/imgs/screen.png')}}" alt="">
        <div class="slider-item" brand-id="" category-id="">
            
            
            <div class="slider-img" style=""></div>
            <div class="slider-info-parent">
                <div class="ddesc"></div>
                <div class="dcode">code:#</div>
            </div>
        </div>
    </div>

    <div class="related-parent">
        <button id="related" class="w-btn">View Related Products</button>
        <div class="radio-parent">
            <div>
                <input checked name="rel" value="brands" type="radio" id="by-brand">
                <label for="by-brand">BY Brand</label>
            </div>

            <div>
                <input name="rel" value="categories" type="radio" id="by-cat">
                <label for="by-cat">BY Category</label>
            </div>
        </div>
    </div>

    <h1 class="title">Search For Products</h1>

    <style>
        .search-box{
            position: relative;
        }
    </style>

    <div class="search-box">
        <div class="search-parent">
            <input placeholder="Find Product.." class="search_text" type="text">
            <button class="fa fa-search"></button>
        </div>
        <div class="search-drop">
            <a href="#">
                <div class="search-item">

                </div>
            </a>
        </div>
    </div>

    <div class="radio-parent">
        <div>
            <input checked value="brands" name="ser" type="radio" id="by-brand2">
            <label for="by-brand2">BY Brand</label>
        </div>

        <div>
            <input name="ser" value="code" type="radio" id="by-code">
            <label for="by-code">BY Code</label>
        </div>
    </div>

    <div class="radio-parent">
        <div>
            <input value="categories" name="ser" type="radio" id="by-cat2">
            <label for="by-cat2">BY Category</label>
        </div>

        <div>
            <input name="ser" value="description" type="radio" id="by-des">
            <label for="by-des">BY Description</label>
        </div>
    </div>

    <div style="text-align: center">
            <p></p>
            <div class="result">Results(<span id="count"></span>)</div>
            <p></p>
            <form id="tosend" action="{{url('sender')}}" method="post">
            @csrf
            <input type="hidden" id="products" name="products">
            <button type="submit" class="w-btn">View Products On Screen</button>
            </form>
            
    </div>

    <script src="{{URL::asset('slider/libs/jquery/jquery.min.js')}}"></script>

    <script>
        function select_result(type,item){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "sliderProducts/"+ type + '/' + item,
                method: "GET",
                data: {
                    type: type,
                    item: item
                },
                // dataType: 'json',
                success: function (data) {
                    $('#count').html(data.length);
                    var string = JSON.stringify(data);
                    $('#products').val(string);
                    $('.search_text').val(item);
                    $('.search-drop').hide();
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }


        $(document).ready(function () {
            var type = $('[name="ser"]').val() ;
            $('[name="ser"]').on('change',function(){
                type = $(this).val();
            });

            var type0 = $('[name="rel"]').val() ;
            $('[name="rel"]').on('change',function(){
                type0 = $(this).val();
                console.log(type0);
            });

            
            load_data();

            function load_data(query) {
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "sliderSearch/"+ type + '/' + query,
                    method: "GET",
                    data: {
                        type: type,
                        query: query
                    },
                    // dataType: 'json',
                    success: function (data) {
                        if (!$.isArray(data) || !data.length) {
                            item = "<div class='search-item'><a><p>No results found</p></div></a>";
                        } else {
                            var item = "";
                            var type1;
                            if(type=='description'){
                                item += " <a href='javascript:select_result(\""+type+"\",\""+query+"\");'>" +
                                    "<div class='search-item'>" +
                                    "<div><p>" + query + "</p>" +
                                    "</div></div></a>";
                            }
                            $(data).each(function (i, f) {
                                if(type=='brands' || type=='categories'){
                                    type1= f.name;
                                }else if(type=='code'){
                                    type1= f.code;
                                }else{
                                    desc=f.description;
                                    type1 = $(desc).text();
                                }
                                item += " <a href='javascript:select_result(\""+type+"\",\""+type1+"\");'>" +
                                    "<div class='search-item'>" +
                                    "<div><p>" + type1 + "</p>" +
                                    "</div></div></a>";
                            });
                        }
                        $(".search-drop").html(item);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }


            // ssssssssssssssssssssssssssssssssss
            $('#related').on('click',function(){
                if(type0=="brands")
                var item = $('.slider-item').attr('brand-id');
                else if(type0=="categories")
                var item = $('.slider-item').attr('category-id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "sliderProductss/"+ type0 + '/' + item,
                    method: "GET",
                    data: {
                        type: type0,
                        item: item
                    },
                    // dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        var string = JSON.stringify(data);
                        $('#products').val(string);
                        $("#tosend").submit()
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });

            $('#restart').on('click',function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "restartSlider",
                    method: "POST",
                    data: {
                        data: "restart"
                    },
                    success: function (data) {
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });

            $('#next').on('click',function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "nextSlider",
                    method: "POST",
                    data: {
                        data: "next"
                    },
                    success: function (data) {
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });

            $('#prev').on('click',function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "prevSlider",
                    method: "POST",
                    data: {
                        data: "prev"
                    },
                    success: function (data) {
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });

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

            
        });
    </script>
</body>

</html>
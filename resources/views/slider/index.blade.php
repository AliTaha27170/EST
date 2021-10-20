<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{URL::asset('slider/libs/slick-1.8.1/slick/slick.css')}}">
    <link rel="stylesheet" href="{{URL::asset('slider/libs/slick-1.8.1/slick/slick-theme.css')}}">
    <link rel="stylesheet" href="{{URL::asset('slider/libs/fa4/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('slider/libs/newsTicker/li-scroller.css')}}">
    <title>Screen</title>
    <link rel="stylesheet" href="{{URL::asset('slider/screen.css')}}">
    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://viralpatel.net/blogs/demo/jquery/get-text-without-child-element/jquery.justtext.1.0.js">
    </script>
    {{-- <script src="{{URL::asset('slider/libs/jquery/jquery.min.js')}}"></script> --}}
    <script src="{{URL::asset('slider/libs/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{URL::asset('slider/libs/slick-1.8.1/slick/slick.min.js')}}"></script>
    <script src="{{URL::asset('slider/libs/newsTicker/jquery.li-scroller.1.0.js')}}"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = false;

        var pusher = new Pusher('fee661f6364ba5630a1d', {
            cluster: 'eu',
            forceTLS: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('form-submitted', function (data) {
            if (data.text == "restart") {
                location.reload();
            } else if (data.text == "next") {
                $(".slider").slick('slickNext');
                console.log(data);
            } else if (data.text == "prev") {
                $(".slider").slick('slickPrev');
                console.log(data);
            } else {
                try {
                    JSON.parse(data.text);
                } catch (e) {
                    return false;
                }
                var prods = JSON.parse(data.text);
                $.ajax({
                    url: 'get_data',
                    type: 'post',
                    data: {
                        prods: prods
                    },
                    success: function (data) {
                        var item = "";
                        $(data).each(function (i, f) {
                            var desc = f.description;
                            item +=
                                '<div class="slider-item" data-id="' +
                                f.id + '" brand-id="' + f.brand_id + '" category-id="' + f
                                .category_id + '"><div class="slider-img"' +
                                "style='background-image: url(\"{{asset('storages/images/products/')}}/"+f
                                .image +"\")' img-name='"+f.image+"'>" +
                                '</div><br><br><br><div class="slider-info-parent">' +
                                '<div class="desc">' + $(desc).text() + '</div>' +
                                '<div class="code">Code:#' + f.code +
                                '</div>' +
                                '</div></div></div>';
                        });
                        $('.slider').slick('unslick');
                        $(".slider").html();
                        $(".slider").html(item);

                        $('.slider').slick({
                            fade: true,
                            infinite: true,
                            speed: 500,
                            autoplay: true,
                            autoplaySpeed: 5000,
                            arrows: false,
                            slidesToShow: 1,
                            slidesToScroll: 1
                        });
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        var id = $('.slick-current').children().attr('data-id');
                        var brand_id = $('.slick-current').children().attr('brand-id');
                        var category_id = $('.slick-current').children().attr('category-id');
                        var img = $('.slick-current').find('.slider-img').attr('img-name');
                        var code = $('.slick-current').find('.code').justtext();
                        var desc = $('.slick-current').find('.desc').text();
                        var data = new Array(id, code, desc, img, brand_id, category_id);
                        $.ajax({
                            url: 'onscreen',
                            type: 'post',
                            data: {
                                data: data
                            },
                            success: function (data) {},
                        });
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }


        });

    </script>
</head>

<body>

        <img src="{{URL::asset('slider//imgs/logo.png')}}" class="logo-img">
        <div class="slider">
            @foreach($products as $i => $product)
                
                <div class="slider-item" data-id="{{$product->id}}" brand-id="{{$product->brand_id}}" category-id="{{$product->category_id}}">
                    <div class="slider-img" style="background-image: url('{{asset('storages/images/products/'.$product->image)}}')" img-name="{{$product->image}}"></div>
                    <br><br><br>
                    <div class="slider-info-parent">
                        <div class="desc">{{strip_tags(html_entity_decode($product->description))}}</div>
                        <div class="code">Code:#{{$product->code}}</div>
                    </div>
                </div>
            
            @endforeach

        </div>

    <script>
        $(document).ready(function () {

            $(".domain-slider").liScroll({
                travelocity: 0.15
            });

            $('.slider').slick({
                fade: true,
                infinite: true,
                speed: 500,
                autoplay: true,
                autoplaySpeed: 5000,
                arrows: false,
                slidesToShow: 1,
                slidesToScroll: 1
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.slider').on('afterChange', function (event, slick, currentSlide, nextSlide) {
                // console.log(nextSlide);
                var id = $('.slick-current').attr('data-id');
                var brand_id = $('.slick-current').attr('brand-id');
                var category_id = $('.slick-current').attr('category-id');
                var img = $('.slick-current').find('.slider-img').attr('img-name');
                var code = $('.slick-current').find('.code').justtext();
                var desc = $('.slick-current').find('.desc').text();
                var data = new Array(id, code, desc, img, brand_id, category_id);
                $.ajax({
                    url: 'onscreen',
                    type: 'post',
                    data: {
                        data: data
                    },
                    success: function (data) {},
                });

            });


        });

        if (self === top) {
            $(".iframe-style").remove();
        }

    </script>
</body>

</html>

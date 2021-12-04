@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{URL::asset('user/css/food_products.css')}}">
<style>
    .top-banner .bg-filter,
    .c-item .bg-filter {
        background-image: url("{{URL::asset('user/img/filter.png')}}")
    }

</style>


<div id="prod_page">
    <div class="top-banner" style="background-image:url('{{URL::asset('user/img/categories/'.$cat_id.'.jpg')}}')">
        <div class="bg-filter"></div>
        <h1>{{$cat_name->name}}</h1>
    </div>

    <div class="row products-section">
        <div class="col-md-3 cats-section">
            <h3>Categories</h1>
                <hr>
                <select class="sel-cat" style="margin-top: 20px;">
                    @foreach($categories as $i => $cat)
                        <option @if($cat_id==$cat->id) selected @endif class="cat" big-cat-id="{{$big_cat}}" value="{{$cat->id}}">{{$cat->name}}</option>
                     @endforeach
                </select>
                <ul>
                    @foreach($categories as $i => $cat)
                    <li @if($cat_id==$cat->id) class="cat-active" @endif><a class="cat" big-cat-id="{{$big_cat}}"
                            cat-id="{{$cat->id}}">{{$cat->name}}</a></li>
                    @endforeach
                </ul>
        </div>

        <div class="col-md-9 cards-section">

            <div class="cards">
                @foreach($products as $product)
                <div class="card" id="{{$product->id}}" data-item-id="{{$product->id}}">
                    <div class="bg-img"
                        style="background-image: url('{{asset('storages/images/products/'.$product->image)}}')"></div>
                    <!-- <img style="width:50%;" src="{{asset('storages/images/products/'.$product->image)}}"> -->
                    <div class="card-details">
                        <p class="card-brand">{{$product->brand->name}}</p>
                        <p class="card-des">
                            {{strip_tags(html_entity_decode($product->description))}}
                        </p>

                        <p class="card-item-num" hidden>#{{$product->code}}</p>
                        @if (Auth::user())
                        <p class="card-price">Price: ${{$product->price}}</p>
                        @endif
                        <p class="card-name" title="Food Name Here">#{{$product->code}}</p>
                        <p hidden class="card-full-des">
                            {{strip_tags(html_entity_decode($product->description))}}
                        </p>
                        <p class="card-packing">
                            <span>Packing: {{$product->packing}}</span>
                        </p>
                        {{-- <p class="card-packing">
                                <span>Packing: 12-8 oz (225g)</span>
                            </p> --}}
                        <div class="card-foot">
                            @if (Auth::user())
                            <button class="mbtn5" onclick="CardAddToCartOrDetails(this, true)">Add to Cart</button>
                            @else
                            <button class="mbtn5" data-toggle="modal" data-target="#alert-login-modal">Add to Cart</button>
                            @endif
                            <button class="mbtn4" onclick="CardAddToCartOrDetails(this, false)">Details</button>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="add-cart-modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add To Cart</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            @if (Auth::user())
            <form action="http://wenfeeusa.americommerce.com/store/addtocart.aspx" method="POST" id="addToCartForm">
                <div class="modal-body">
                    <input name="itemname" class="itemname" type="hidden" value="item" />
                    <input name="itemdesc" class="itemdesc" type="hidden" value="Najibest" />
                    <input name="itemnr" class="itemnr" type="hidden" value="code" />
                    <input name="imageurl" class="imageurl" type="hidden" value="" />
                    <input name="price" class="price" type="hidden" value="" />
                    {{-- <input name="itemurl" type="hidden" value="" /> --}}
                        
                    <ul class="cart-list">
                        <li>
                            <div class="bg-img"></div>
                            <div class="cart-details">
                                <p class="cart-brand">Brand Here</p>
                                <p class="cart-name" title="Food Name">Food Name Here</p>
                                <p class="cart-des">Some description in this area</p>
                                <div class="cart-foot">
                                    <p class="cart-price">#G6564</p>
                                    <p class="cart-packing">
                                        <span>Packing: 12-8 oz (225g)</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="count-parent">
                        <input name="qty" class="count-input" min="1" type="number" value="1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="mbtn5" type="submit">Add To Cart</button>
                    <button type="button" class="mbtn4" data-dismiss="modal">Close</button>
                </div>
            </form>
            @else
                <div class="modal-body">
                    <ul class="cart-list">
                        <li>
                            <div class="bg-img"></div>
                            <div class="cart-details">
                                <p class="cart-brand">Brand Here</p>
                                <p class="cart-name" title="Food Name">Food Name Here</p>
                                <p class="cart-des">Some description in this area</p>
                                <div class="cart-foot">
                                    <p class="cart-price">#G6564</p>
                                    <p class="cart-packing">
                                        <span>Packing: 12-8 oz (225g)</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="count-parent">
                        <input name="qty" class="count-input" min="1" type="number" value="1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="mbtn5">Add To Cart</button>
                    <button type="button" class="mbtn4" data-dismiss="modal">Close</button>
                </div>
            @endif
        </div>
    </div>
</div>

<div class="modal fade" id="view-cart-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add To Cart</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Item added to cart!</p>
            </div>
            <div class="modal-footer">
                <a href="http://wenfeeusa.americommerce.com/store/shopcart.aspx"><button class="mbtn5" type="submit">View Cart</button></a>
                <button type="button" class="mbtn4" data-dismiss="modal">Continue Shopping</button>
            </div>
           
            
        </div>
    </div>
</div>

<div class="modal fade" id="alert-login-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3></h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <p>You are not logged in, please <a style="text-decoration: underline !important; color: brown !important" href="#"  onclick="$('#alert-login-modal').modal('hide'); $('#login-modal').modal('show');">login</a> first </p>
                <p>Don't have an account? <a style="text-decoration: underline !important; color: brown !important" href="{{route('business.create')}}">sign up!</a> </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="mbtn4" data-dismiss="modal">Close</button>
                </div>
               
                
            </div>
        </div>
    </div>


<div class="modal fade" id="details-modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h3>Product Details</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="bg-img"></div>
                <!-- <img src="/img/bg5.jpg" alt=""> -->
                <div class="card-details">
                    <p class="details-brand">Brand Here</p>
                    <p hidden class="details-name" title="Food Name Here Food Name Here Food Name Here Food Name Here">
                        Food Name Here Food Name Here Food Name Here Food Name Here
                    </p>
                    @if (Auth::user())
                    <p class="details-price">
                        <span>Price: $50</span>
                    </p>
                    @endif

                    <p class="details-item-num">
                        <span>#GFFD5</span>
                    </p>
                    <p class="details-full-des">
                        Some description in this area Some description in this area Some description in this
                        area
                    </p>
                    <p class="details-packing">
                        <span>Packing: 12-8 oz (225g)</span>
                    </p>
                </div>
            </div>

            <div class="modal-footer">
                @if (Auth::user())
                <button class="mbtn5"
                    onclick="$('#details-modal').modal('hide'); $('#add-cart-modal').modal('show');">Add To
                    Cart</button>
                @endif
                <button type="button" class="mbtn4" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
@push('page_scripts')
<script>
    $( window ).on( "load", function() {
    var div = window.location.href.split("#")[1];
    $("#"+div).css("border", "2px solid #9A96DB");
    $('html,body').animate({scrollTop: $("#"+div).offset().top},'slow');
});
</script>
<script>
    $(document).on('click', ".cat", function () {

        var id = $(this).attr('cat-id');
        var big_cat = $(this).attr('big-cat-id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '../get_products/' + big_cat + '/' + id,
            data: {
                id: id,
                big_cat: big_cat
            },
            dataType: 'json',
            success: function (data) {
                $('#prod_page').html(data.html);
            },
            error: function (error) {
                console.log(error);
            }
        });
        $(".cat-active").removeClass("cat-active");
        $(this).closest("li").addClass("cat-active");
        $("html, body").animate({ scrollTop: 0 }, "slow");
    });
    

</script>
<script>
$(document).on('change', ".sel-cat", function () {

var id = $(this).val();
var big_cat = $(this).find('option:selected').attr('big-cat-id');
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    type: "GET",
    url: '/get_products/' + big_cat + '/' + id,
    data: {
        id: id,
        big_cat: big_cat
    },
    dataType: 'json',
    success: function (data) {
        $('#prod_page').html(data.html);
    },
    error: function (error) {
        console.log(error);
    }
});
$(".cat-active").removeClass("cat-active");
$(this).closest("li").addClass("cat-active");
$("html, body").animate({ scrollTop: 0 }, "slow");
});
</script>

<script>
    
    var selectedProductId = "";

    function CardAddToCartOrDetails(ele, isCart) {
        var item = $(ele);
        var itemCard = item.closest(".card");

        var itemId = itemCard.attr("data-item-id"),
            imgSrc = itemCard.find(".bg-img").css("background-image"),
            itemBrand = itemCard.find(".card-brand").html(),
            itemName = itemCard.find(".card-name").html(),
            itemDes = itemCard.find(".card-des").html(),
            itemFullDes = itemCard.find(".card-full-des").html(),
            itemPacking = itemCard.find(".card-packing span").html(),
            itemPrice = itemCard.find(".card-price").html(),
            itemNumber = itemCard.find(".card-item-num").html();

        var addCartModal = $("#add-cart-modal");
        
        addCartModal.find(".itemnr").val(itemName);
        addCartModal.find(".itemname").val(itemDes+" - Najibest");
        var img = "http://wenfee.com/najibest/storages/images/products/"+itemName.substr(1)+".jpg";
        addCartModal.find(".imageurl").val(img);
        addCartModal.find(".price").val(itemPrice);
        addCartModal.find(".count-input").val(1);
        

        addCartModal.find(".cart-name").html(itemName);
        addCartModal.find(".cart-brand").html(itemBrand);
        addCartModal.find(".bg-img").css("background-image", imgSrc);
        addCartModal.find(".cart-des").html(itemDes);
        addCartModal.find(".cart-packing span").html(itemPacking);
        addCartModal.find(".cart-item-num").html(itemNumber),
            addCartModal.find(".cart-price").html(itemPrice);

        var detailsModal = $("#details-modal");
        detailsModal.find(".details-name").html(itemName);
        detailsModal.find(".details-brand").html(itemBrand);
        detailsModal.find(".bg-img").css("background-image", imgSrc);
        detailsModal.find(".details-full-des").html(itemFullDes);
        detailsModal.find(".details-packing span").html(itemPacking);
        detailsModal.find(".details-price").html(itemPrice),
            detailsModal.find(".details-item-num").html(itemNumber);

        selectedProductId = itemId;
        if (isCart)
            addCartModal.modal("show");
        else
            detailsModal.modal("show");
    }

    $(document).on('submit', "#addToCartForm", function (e) {
        e.preventDefault();
        var addCartModal = $("#add-cart-modal");
        var itemname = $(this).find('input[name="itemname"]').val();
        var itemnr = $(this).find('input[name="itemnr"]').val();
        var imageurl = $(this).find('input[name="imageurl"]').val();
        var price = $(this).find('input[name="price"]').val();
        var qty = $(this).find('input[name="qty"]').val();
        var itemdesc = $(this).find('input[name="itemdesc"]').val();
        $.ajax({
            headers: {  'Access-Control-Allow-Origin': '*' },
            type: "POST",
            url: 'http://wenfeeusa.americommerce.com/store/addtocart.aspx',
            crossDomain: true,
            dataType: 'jsonp',
            data: {
                itemname : itemname,
                itemdesc : itemdesc,
                itemnr : itemnr,
                imageurl : imageurl,
                price : price,
                qty : qty
                
            },
            success: function( data ) {
                // console.log( "donnneee" );
            },
            error: function( data ) {
                // console.log( data );
            },
        });
        
        var viewCartModal = $("#view-cart-modal");
        addCartModal.modal('hide');
        viewCartModal.modal('show');

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
    
    });

    $(".count-input").niceNumber();

</script>
@endpush



@endsection

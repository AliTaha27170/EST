@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{URL::asset('user/css/food_products.css')}}">
<style>
    .top-banner .bg-filter,
    .c-item .bg-filter{
        background-image: url("{{URL::asset('user/img/filter.png')}}")
    }
</style>


<div id="prod_page">
<div class="top-banner" style="background-image:url('{{URL::asset('user/img/b_'.$brand->id.'.jpg')}}')">
    <div class="bg-filter"></div>
    <h1>{{$brand->name}} Products</h1>
</div>

<div class="row products-section">
    

    <div class="col-md-12 cards-section">
        
            <div class="cards">
                @foreach($products as $product)
                <div class="card" id="{{$product->id}}" data-item-id="{{$product->id}}">
                    <div class="bg-img" style="background-image: url('{{asset('storages/images/products/'.$product->image)}}')"></div>
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
                        <p class="card-name" title="Food Name Here Food Name Here Food Name Here Food Name Here">
                            #{{$product->code}}
                        </p>
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
                            <button class="mbtn5" onclick="CardAddToCartOrDetails(this, true)">Add to Cart</button>
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

            <div class="modal-body">
                <ul class="cart-list">
                    <li>
                        <div class="bg-img"></div>
                        <!-- <img style="width:50%;" src="{{URL::asset('user/img/bg5.jpg')}}"> -->
                        <div class="cart-details">
                            <p class="cart-brand">Brand Here</p>
                            <p class="cart-name" title="Food Name Here Food Name Here Food Name Here Food Name Here">
                                Food Name Here Food Name Here Food Name Here Food Name Here
                            </p>
                            <p class="cart-des">
                                Some description in this area Some description in this area Some description in this
                                area
                            </p>
                            <div class="cart-foot">
                                @if (Auth::user())
                                <p class="cart-price">#G6564</p>
                                @endif
                                <p class="cart-packing">
                                    <span>Packing: 12-8 oz (225g)</span>
                                </p>
                            </div>

                        </div>
                    </li>
                </ul>

                <div class="count-parent">
                    <input class="count-input" min="1" type="number" value="1">
                </div>

            </div>

            <div class="modal-footer">
                <button class="mbtn5" onclick="submitAddToCart()">Add To Cart</button>
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
                <button class="mbtn5"
                    onclick="$('#details-modal').modal('hide'); $('#add-cart-modal').modal('show');">Add To
                    Cart</button>
                <button type="button" class="mbtn4" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

@push('page_scripts')
<script>
    $(document).on('click',".cat",function(){
        
        var id = $(this).attr('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: 'get_products/' + id,
            data: {
                id: id
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
    });
   
    $('.cat').on('click', function () {
        var id = $(this).attr('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: 'get_products/' + id,
            data: {
                id: id
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
    });

</script>
<script>
    // $(document).ready(function () {
    //     $(".owl-carousel").owlCarousel({
    //         loop: true,
    //         items: 1,
    //         nav: true
    //     })
    // });

    $(".count-input").niceNumber();

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

    function submitAddToCart() {
        var addCartModal = $("#add-cart-modal");

        //item id
        id = selectedProductId;

        //selected amount
        var amount = addCartModal.find(".count-parent input").val();

        /*****************************
         *                           *
         *     AJAX REQUEST HERE :)  *
         *                           *
         *****************************/

        addCartModal.modal("hide");

    }

</script>
@endpush



@endsection

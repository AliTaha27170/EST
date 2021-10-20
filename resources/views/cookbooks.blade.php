@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{URL::asset('user/css/food_products.css')}}">
<style>
    .c-item .bg-filter {
        background-image: url("{{URL::asset('user/img/filter.png')}}")
    }

</style>
<div class="owl-carousel">

    <div class="c-item">
        <div class="bg-img" style="background-image:url('{{URL::asset('user/img/cookbook1.jpg')}}')"></div>
        <div class="bg-filter"></div>
        <div class="c-content">
            <h4>Our Cookbooks</h4>
            <h1>Learn To Cook From Scratch And Become A Chef</h1>
        </div>

    </div>

    <div class="c-item">
        <div class="bg-img" style="background-image:url('{{URL::asset('user/img/cookbook2.jpg')}}')"></div>
        <div class="bg-filter"></div>
        <div class="c-content">
            <h4>Our Cookbooks</h4>
            <h1>Learn To Cook From Scratch And Become A Chef</h1>
        </div>

    </div>
</div>

<!-- 
<div class="top-banner" style="background-image:url('{{URL::asset('user/img/bg7.jpg')}}')">
    <h1>Our Cookbooks</h1>
</div> -->

<div class="books-section">
    <!-- <h3>Our Cookbooks</h3> -->
    @foreach($books as $book)
    <div class="card card-wide" data-item-id="{{$book->id}}">
        <img src="{{asset('storages/images/products/'.$book->image)}}">
        <div class="card-details">
            <p class="card-brand">author: {{$book->author}} </p>
            <p class="card-name" title="Food Name Here Food Name Here Food Name Here Food Name Here">
                {{strip_tags(html_entity_decode($book->description))}}
            </p>
            <p class="card-des">
                {{strip_tags(html_entity_decode($book->long_description))}}
            </p>
            <p class="card-packing">
                <span>Language: {{$book->language}}</span>
            </p>
            <div class="card-foot">
                <p class="card-item-num">#{{$book->code}}</p>
                <button class="mbtn5" onclick="CardAddToCart(this)">Add to
                    Cart</button>
            </div>
        </div>
    </div>
    @endforeach
    {{$books->links()}}
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
                        <img src="{{asset('user/img/bg5.jpg')}}">
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
                                <p class="cart-item-num">#G6564</p>
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
@push('page_scripts')
<script>
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel({
            loop: true,
            items: 1,
            nav: true
        })
    });

    $(".count-input").niceNumber();

    var selectedProductId = "";

    function CardAddToCart(ele) {
        var item = $(ele);
        var itemCard = item.closest(".card");

        var itemId = itemCard.attr("data-item-id"),
            imgSrc = itemCard.find("img").attr("src"),
            itemBrand = itemCard.find(".card-brand").html(),
            itemName = itemCard.find(".card-name").html(),
            itemDes = itemCard.find(".card-des").html(),
            itemPacking = itemCard.find(".card-packing span").html(),
            itemNumber = itemCard.find(".card-item-num").html();

        var addCartModal = $("#add-cart-modal");
        addCartModal.find(".cart-name").html(itemName);
        addCartModal.find(".cart-brand").html(itemBrand);
        addCartModal.find("img").attr("src", imgSrc);
        addCartModal.find(".cart-des").html(itemDes);
        addCartModal.find(".cart-packing span").html(itemPacking);
        addCartModal.find(".cart-item-num").html(itemNumber);

        selectedProductId = itemId;

        addCartModal.modal("show");
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

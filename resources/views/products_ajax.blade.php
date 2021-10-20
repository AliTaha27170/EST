<div class="top-banner" style="background-image:url('{{URL::asset('user/img/categories/'.$category->id.'.jpg')}}')">
    <div class="bg-filter"></div>
    <h1>{{$category->name}}</h1>
</div>

<div class="row products-section">
    <div class="col-md-3 cats-section">
        <h3>Categories</h1>
            <hr>
            <select class="sel-cat" style="margin-top: 20px;">
                @foreach($categories as $i => $cat)
                    <option @if($category->id==$cat->id) selected @endif class="cat" big-cat-id="{{$big_cat}}" value="{{$cat->id}}">{{$cat->name}}</option>
                 @endforeach
            </select>
            <ul>
                @foreach($categories as $i => $cat)
                <li @if($category->id==$cat->id) class="cat-active" @endif><a class="cat" big-cat-id="{{$big_cat}}" cat-id="{{$cat->id}}">{{$cat->name}}</a></li>
                @endforeach
            </ul>
    </div>

    <div class="col-md-9 cards-section">

            <div class="cards">
                    @foreach($products as $product)
                    <div class="card" id="{{$product->id}}" data-item-id="{{$product->id}}">
                        <div class="bg-img" style="background-image: url('{{asset('storages/images/products/'.$product->image)}}')"></div>
                        <!-- <img style="width:50%;" src="{{asset('storages/images/products/'.$product->image)}}"> -->
                        <div class="card-details">
                            <p class="card-brand">{{$product->brand->name}}</p>
                            <p class="card-des">{{strip_tags(html_entity_decode($product->description))}}</p>
                            
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
                                <button class="mbtn5" onclick="CardAddToCartOrDetails(this, true)">Add to Cart</button>
                                <button class="mbtn4" onclick="CardAddToCartOrDetails(this, false)">Details</button>
                            </div>
                        </div>
                    </div>
                    @endforeach

            </div>
        </div>
    </div>
    

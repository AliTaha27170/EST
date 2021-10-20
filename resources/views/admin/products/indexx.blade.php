@extends('admin.layouts.master')
@section('pageBody')
<div class="row">
    <div class="col-md-12">

            <div class="content-frame">   
                    
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">                        
                        <div class="page-title">                    
                            <h2></span> Products</h2>
                        </div>                         
                    </div>
                    
                    <!-- START CONTENT FRAME RIGHT -->
                    <div class="content-frame-right">                        
                                             
                        <h4>Categories:</h4>
                        <div class="list-group border-bottom push-down-20">
                            <a href="#" class="list-group-item active">All <span class="badge badge-primary">{{$products->count()}}</span></a>
                            @foreach($categories as $category)
                            <a href="#" class="list-group-item">{{$category->name}} <span class="badge badge-info">2</span></a>
                            @endforeach
                        </div>    
                    </div>
                    <!-- END CONTENT FRAME RIGHT -->
                
                    <!-- START CONTENT FRAME BODY -->
                    <div class="content-frame-body content-frame-body-left">
                        
                       
                        <div class="gallery" id="links">
                                @foreach($products as $product)
                            <a class="gallery-item" href="assets/images/gallery/nature-1.jpg" title="Nature Image 1" data-gallery>
                                <div class="image">                              
                                    <img src="{{asset('storage/images/products/'.$product->image)}}" alt="Nature Image 1"/>                                        
                                    <ul class="gallery-item-controls">
                                        <li><span class="gallery-item-remove"><i class="fa fa-pencil"></i></span></li>
                                        <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>{{$product->code}}</strong>
                                    <span>@if($product->category_id==0)
                                            cook boocks
                                        @else
                                            {{$product->category->name}}
                                        @endif</span>
                                        <span>{{$product->brand->name}}</span>
                                </div>                                
                            </a>
                         @endforeach   
                             
                        </div>

                             
                        <ul class="pagination pagination-sm pull-right push-down-20 push-up-20">
                            <li class="disabled"><a href="#">«</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>                                    
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>       
                    <!-- END CONTENT FRAME BODY -->
                </div>               
</div> 

</div>
@push('delete')
    <script>
        $(document).on('click','.deleteA',function(e){
            var id = $(this).data('id');
            var token = $(this).data('token');
            var element = $(e.currentTarget);
            var tr = element.closest('tr');

            $.ajax({
                url: 'products/'+id,
                type: 'DELETE',
                data: {
                    'id':id,
                    '_method': 'DELETE',
                    '_token': token,
                },
                success: function(data){
                    tr.fadeOut('slow');
                    // tr.remove/();
                    toastr.success(data)
                },
                error: function(error){
                    toastr.error('error!');  
                }
            });

        });
    </script>
@endpush

@endsection
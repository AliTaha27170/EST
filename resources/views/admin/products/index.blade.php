@extends('admin.layouts.master')
@section('pageBody')
<div class="row">
    <div class="col-md-12">

        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">                                
                <h3 class="panel-title"><strong>Products</strong></h3>
                                             
            </div>
            <div class="panel-body">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Hidden</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->code}}</td>
                            <td><img width="100" height="100" src="{{asset('storages/images/products/'.$product->image)}}"></td>
                            <td>
                                @if($product->category_id==0)
                                    cook boocks
                                @else
                                    {{$product->category->name}}
                                @endif
                            </td>
                            <td>{{$product->brand->name}}</td>
                            <td>
                                @if($product->is_hidden==1)
                                Yes
                                @else
                                No
                                @endif
                            </td>
                            <td>
                                <a href="products/{{$product->id}}/edit" class="btn btn-info">edit</a>
                                <button data-id="{{$product->id}}" data-token="{{csrf_token()}}" type="button" class="btn btn-danger deleteA">delete</button>
                            </td>
                            
                        </tr>
                        @endforeach
      
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END DEFAULT DATATABLE -->
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
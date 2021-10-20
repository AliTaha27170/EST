@extends('admin.layouts.master')
@section('pageBody')
<div class="row">
    <div class="col-md-12">
        
        <form class="form-horizontal" method="post" action="{{route('products.update',$product->id)}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Edit product </strong></h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>
            </div>
            
            <div class="panel-body">                                                                        
                
                <div class="row">
                    
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">code </label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input value="{{$product->code}}" type="text" name="code" class="form-control"/>
                                </div>          
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">category</label>
                            <div class="col-md-9">  
                                @if($product->category_id==0)
                                    <input value="cook books" readonly="true" type="text" class="form-control"/>
                                    <input type="hidden" value="0" type="text" name="category_id" class="form-control"/>
                                @else
                                <select class="form-control select" name="category_id"> 
                                    @foreach($categories as $category)
                                        <option @if($product->category_id==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">brand</label>
                            <div class="col-md-9">                                                                                            
                                <select class="form-control select" name="brand_id">
                                    @foreach($brands as $brand)
                                        <option @if($product->brand_id==$brand->id) selected @endif value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">packing </label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input value="{{$product->packing}}" type="text" name="packing" class="form-control"/>
                                </div>          
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">image</label>
                            <div class="col-md-9">                                                                                                                                        
                                <input type="file" class="fileinput btn-primary" name="image" id="image" title="Browse file"/>
                            </div>
                        </div>
                        @if($product->category_id==0)
                        <div id="div1" class="form-group">
                            <label class="col-md-3 control-label">author </label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input value="{{$book->author}}" type="text" name="author" class="form-control"/>
                                </div>          
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                      

                        <div class="form-group">
                            <label class="col-md-3 control-label">price</label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input value="{{$product->price}}" type="text" name="price" class="form-control"/>
                                </div>          
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-3">                                                                                                                                        
                                <label class="check"><input type="checkbox"  @if($product->is_hidden==1) checked @endif value="1" class="icheckbox" name="is_hidden"/>hide</label>
                            </div>
                            <div class="col-md-4">                                                                                                                                        
                                <label class="check"><input type="checkbox"  @if($product->in_stock==1) checked @endif value="1" class="icheckbox" name="in_stock"/>in stock</label>
                            </div>
                        </div>
                        @if($product->category_id==0)
                        <div id="div2" class="form-group">
                            <label class="col-md-3 control-label">language </label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input value="{{$book->language}}" type="text" name="language" class="form-control"/>
                                </div>          
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row" style="margin-top:3%;">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-1  control-label">description</label>
                            <div class="col-md-11 ">                
                                <textarea name="description" id="editor1" rows="10" cols="80">{{$product->description}}
                                </textarea>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label class="col-md-9 col-xs-12 control-label"></label>
                            <div class="col-md-3 col-xs-12">                                            
                                <div class="input-group">
                                <button type="submit" class="btn btn-primary pull-right">Add</button>
                                </div>         
                            </div>
                        </div> --}}
                    </div>
                </div>
                @if($product->category_id==0)
                <div id="div3" class="row" style="margin-top:3%;">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-1  control-label">long description</label>
                            <div class="col-md-11 ">                
                                <textarea name="long_description" id="editor2" rows="10" cols="80">{{$book->long_description}}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            
            <div class="panel-footer">                                    
                <button type="submit" class="btn btn-primary pull-right">Edit</button>
            </div>
        </div>
        </form>
        
    </div>
</div>
@push('ckeditor')
    <script>
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor2' );
    </script>
@endpush
@endsection
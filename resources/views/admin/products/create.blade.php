@extends('admin.layouts.master')
@section('pageBody')
<div class="row">
    <div class="col-md-12">
        
        <form class="form-horizontal" method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Add new product </strong></h3>
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
                                    <input type="text" name="code" class="form-control"/>
                                </div>          
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">category</label>
                            <div class="col-md-9">                                                                                            
                                <select class="form-control select" id="cat" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                    <option value="0">cook books</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">brand</label>
                            <div class="col-md-9">                                                                                            
                                <select class="form-control select" name="brand_id">
                                    <option value="0">no brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">packing </label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" name="packing" class="form-control"/>
                                </div>          
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">image</label>
                            <div class="col-md-9">                                                                                                                                        
                                <input type="file" class="fileinput btn-primary" name="image" id="image" title="Browse file"/>
                            </div>
                        </div>

                        <div id="div1" class="form-group">
                            <label class="col-md-3 control-label">author </label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" name="author" class="form-control"/>
                                </div>          
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                       

                        <div class="form-group">
                            <label class="col-md-3 control-label">price</label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" name="price" class="form-control"/>
                                </div>          
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-3">                                                                                                                                        
                                <label class="check"><input type="checkbox" value="1" class="icheckbox" name="is_hidden"/>hide</label>
                            </div>
                            <div class="col-md-4">                                                                                                                                        
                                <label class="check"><input type="checkbox" value="1" class="icheckbox" name="in_stock"/>in stock</label>
                            </div>
                        </div>
                        <div id="div2" class="form-group">
                            <label class="col-md-3 control-label">language </label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" name="language" class="form-control"/>
                                </div>          
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="row" style="margin-top:3%;">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-1  control-label">description</label>
                            <div class="col-md-11 ">                
                                <textarea name="description" id="editor1" rows="10" cols="80">
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="div3" class="row" style="margin-top:3%;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-1  control-label">long description</label>
                                <div class="col-md-11 ">                
                                    <textarea name="long_description" id="editor2" rows="10" cols="80">
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="panel-footer">                                    
                <button type="submit" class="btn btn-primary pull-right">Add</button>
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
    <script>
        $('#div1').hide();
        $('#div2').hide();
        $('#div3').hide();
        $('#cat').change(function(){
    if($(this).val() == '0'){
        $('#div1').show('slow');
        $('#div2').show('slow');
        $('#div3').show('slow');
    }else{
        $('#div1').hide('slow');
        $('#div2').hide('slow');
        $('#div3').hide('slow');
    }

});
    </script>
@endpush
@endsection
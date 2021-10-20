@extends('admin.layouts.master')
@section('pageBody')
<div class="row">
    <div class="col-md-12">
        
        <form class="form-horizontal" method="post" action="{{route('brands.store')}}">
        @csrf
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Add new brand </strong></h3>
                
            </div>
  
            <div class="panel-body">                                                                        
                
                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Brand name</label>
                    <div class="col-md-6 col-xs-12">                                            
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            <input type="text" name="name" class="form-control"/>
                        </div>         
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-8 col-xs-12 control-label"></label>
                    <div class="col-md-3 col-xs-12">                                            
                        <div class="input-group">
                        <button type="submit" class="btn btn-primary pull-right">Add</button>
                        </div>         
                    </div>
                </div>
               
            </div>
          
        </div>
        </form>
        
    </div>
</div>   
@endsection
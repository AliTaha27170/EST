@extends('admin.layouts.master')
@section('pageBody')
<style>
    .widget .widget-buttons.widget-c3 .col {
    width: 100%;
}
</style>
    <div class="row" style="margin-top:30px;">
        <div class="col-md-1"></div>
        <!-- END WIDGET SLIDER -->
        <div class="col-md-3">
            <!-- START WIDGET MESSAGES -->
            <div class="widget widget-default widget-item-icon" onclick="location.href='{{url('administrator/contact')}}';">
                <div class="widget-item-left">
                    <span class="fa fa-envelope"></span>
                </div>                             
                <div class="widget-data">
                    <div class="widget-int num-count">{{$messages}}</div>
                    <div class="widget-title">New messages</div>
                    <div class="widget-subtitle">In your mailbox</div>
                </div>      
                <div class="widget-controls">                                
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>                            
            <!-- END WIDGET MESSAGES -->
        </div>
        <div class="col-md-3">
            <!-- START WIDGET REGISTRED -->
            <div class="widget widget-default widget-item-icon" onclick="location.href='{{url('administrator/business')}}';">
                <div class="widget-item-left">
                    <span class="fa fa-user"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">{{$reg_users}}</div>
                    <div class="widget-title">Registred users</div>
                    <div class="widget-subtitle">On your website</div>
                </div>
                <div class="widget-controls">                                
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>                            
            </div>                            
            <!-- END WIDGET REGISTRED -->
        </div>
        <div class="col-md-3">
            <!-- START WIDGET CLOCK -->
            <div class="widget widget-info widget-padding-sm">
                <div class="widget-big-int plugin-clock">10<span>:</span>27</div>                            
                <div class="widget-subtitle plugin-date">Wednesday, February 27, 2019</div>
                <div class="widget-controls">                                
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>                            
                <div class="widget-buttons widget-c3">
                    <div class="col">
                        <a href="{{url('administrator/calendar')}}"><span class="fa fa-calendar"></span></a>
                    </div>
                </div>                            
            </div>                        
            <!-- END WIDGET CLOCK -->
        </div>
    </div>
    
    

@push('delete')
    <script>
        $(function(){  
            

            var today = new Date();
            
            var i=1;
            var month = new Array;
            while(i<6){
                month[i] = new Date();
                month[i].setMonth(month[i].getMonth() - i);
                i++;
            }
            
        });
    </script>
@endpush
@endsection


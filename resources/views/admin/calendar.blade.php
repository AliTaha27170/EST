@extends('admin.layouts.master')
@section('pageBody')
<!-- START CONTENT FRAME -->

<div class="content-frame">            
        <!-- START CONTENT FRAME TOP -->
        <div class="content-frame-top">                        
            <div class="page-title">                    
                <h2><span class="fa fa-calendar"></span> Calendar</h2>
            </div>  
            <div class="pull-right">
                <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
            </div>                                                                                
        </div>
        <!-- END CONTENT FRAME TOP -->
        
        {{-- <!-- START CONTENT FRAME LEFT -->
        <div class="content-frame-left">
            <h4>New Event</h4>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="new-event-text" placeholder="Event text..."/>
                    <div class="input-group-btn">
                        <button class="btn btn-primary" id="new-event">Add</button>
                    </div>
                </div>
            </div>
            
            <h4>External Events</h4>
            <div class="list-group border-bottom" id="external-events">                                    
                <a class="list-group-item external-event">test events1</a>
                <a class="list-group-item external-event">test events2</a>
                <a class="list-group-item external-event">test events3</a>
            </div>                            
            
            <div class="push-up-10">
                <label class="check">
                    <input type="checkbox" class="icheckbox" id="drop-remove"/> Remove after drop
                </label>
            </div>     
            
            {{-- <div class="panel panel-default push-up-10">
                <div class="panel-body padding-top-0">
                    <h4>Fullcalendar</h4>
                    <p>FullCalendar is a jQuery plugin that provides a full-sized, drag & drop event calendar like the one below. It uses AJAX to fetch events on-the-fly and is easily configured to use your own feed format. It is visually customizable with a rich API.</p>
                </div>
            </div> --}}
        </div> 
        <!-- END CONTENT FRAME LEFT -->
        
        <!-- START CONTENT FRAME BODY -->
        <div class="content-frame-body padding-bottom-0">
            
            <div class="row">
                <div class="col-md-12">
                    <div id="alert_holder"></div>
                    <div class="calendar">                                
                        <div id="calendar"></div>                            
                    </div>
                </div>
            </div>
            
        </div>                    
        <!-- END CONTENT FRAME BODY -->
        
    </div>               
    <!-- END CONTENT FRAME -->  

</div>
@push('delete')
<script type="text/javascript" src="{{URL::asset('js/plugins/moment.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
<script>
$(function() {
    var fullCalendar = function(){
            
            var calendar = function(){
                
                if($("#calendar").length > 0){
                    
                    function prepare_external_list(){
                        
                        $('#external-events .external-event').each(function() {
                                var eventObject = {title: $.trim($(this).text())};
    
                                $(this).data('eventObject', eventObject);
                                $(this).draggable({
                                        zIndex: 999,
                                        revert: true,
                                        revertDuration: 0
                                });
                        });                    
                        
                    }
                    
                    
                    var date = new Date();
                    var d = date.getDate();
                    var m = date.getMonth();
                    var y = date.getFullYear();
    
                    prepare_external_list();
    
                    var calendar = $('#calendar').fullCalendar({
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay'
                        },
                        
                        
                        droppable: true,
                        selectable: true,
                        selectHelper: true,
                        
                    });
                    
                    
                }            
            }
    
            return {
                init: function(){
                    calendar();
                }
            }
        }();

        fullCalendar.init();
    
        
     
});

</script>
@endpush

@endsection
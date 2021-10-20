@extends('admin.layouts.master')
@section('pageBody')
<div class="row">
    <div class="col-md-12">

        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">                                
                <h3 class="panel-title"><strong>Contact Messages</strong></h3>
                                             
            </div>
            <div class="panel-body">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>email</th>
                            <th>date</th>
                            <th>status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                        <tr>
                            <td>{{$message->name}}</td>
                            <td>{{$message->email}}</td>
                            <td>{{$message->created_at}}</td>
                            <td>
                                @if($message->status==0)
                                <span class="label label-success">Unread</span>
                                @endif
                            </td>
                            <td>
                                <a href="contact/{{$message->id}}" class="btn btn-info">details</a>
                                {{-- <button data-id="{{$category->id}}" data-token="{{csrf_token()}}" type="button" class="btn btn-danger deleteA">delete</button> --}}
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
                url: 'categories/'+id,
                type: 'DELETE',
                data: {
                    'id':id,
                    '_method': 'DELETE',
                    '_token': token,
                },
                success: function(data){
                    tr.fadeOut('slow');
                    // tr.remove/();
                    toastr.success('deleted successfully')
                },
                error: function(error){
                    toastr.error('error!');  
                }
            });

        });
    </script>
@endpush

@endsection
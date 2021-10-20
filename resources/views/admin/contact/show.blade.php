@extends('admin.layouts.master')
@section('pageBody')
<style>
    th{
        color: #56688A;
    }
</style>
<div class="row">
    <div class="col-md-12">
            <div class="panel panel-default">
                    <div class="panel-heading ui-draggable-handle">
                        <h3 class="panel-title"><strong>Message information </strong></h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th width="150">name</th>
                                    <td>{{$message->name}}</td>
                                </tr>
                                <tr>
                                    <th>email</th>
                                    <td>{{$message->email}}</td>
                                </tr>
                                <tr>
                                    <th>date</th>
                                    <td>{{$message->created_at}}</td>
                                </tr>
                                <tr>
                                    <th >message</th>
                                    <td>{{$message->message}}</td>
                                </tr>
                            </tbody>
                        </table>  
                        <h2>Address information</h2> 
                        <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th width="150">name</th>
                                        <td>{{$address->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>address </th>
                                        <td>{{$address->address}}</td>
                                    </tr>
                                    <tr>
                                        <th>state </th>
                                        <td>{{$address->state}}</td>
                                    </tr>
                                    <tr>
                                        <th>city </th>
                                        <td>{{$address->city}}</td>
                                    </tr>
                                    <tr>
                                        <th>zipcode</th>
                                        <td>{{$address->zip_code}}</td>
                                    </tr>
                                    <tr>
                                        <th>telephone</th>
                                        <td>{{$address->telephone}}</td>
                                    </tr>
                                    <tr>
                                        <th>fax</th>
                                        <td>{{$address->fax}}</td>
                                    </tr>
                                </tbody>
                            </table>               
                    </div>
                </div>
        
    </div>
</div>   
@endsection
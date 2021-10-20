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
            <div class="panel-body">
                <h3> user information</h3>
            </div>
        </div>
        
    </div>
</div>

<div class="row">                        
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body">                            
                <div class="tocify-content">
                    <h2>Main information</h2>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th width="150">name</th>
                                    <td>{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <th>trade name</th>
                                    <td>{{$user->trade_name}}</td>
                                </tr>
                                <tr>
                                    <th>est year</th>
                                    <td>{{$user->est_year}}</td>
                                </tr>
                                <tr>
                                    <th>contact name</th>
                                    <td>{{$user->contact_name}}</td>
                                </tr>
                                <tr>
                                    <th>email</th>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <th>type of business</th>
                                    <td>
                                        @foreach($type as $t)
                                        {{$t}}<br>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>bank account no</th>
                                    <td>{{$user->bank_acc_no}}</td>
                                </tr>
                                <tr>
                                    <th>tax id no</th>
                                    <td>{{$user->tax_id_no}}</td>
                                </tr>
                                <tr>
                                    <th>sales tax no</th>
                                    <td>{{$user->sales_tax_no}}</td>
                                </tr>
                            </tbody>
                        </table>

                    <h2>Partnership</h2>
                        <table class="table table-striped">
                            <thead>
                                <th>name</th>
                                <th>social security no</th>
                            </thead>
                            <tbody>
                                @foreach($partnership as $partner)
                                    <tr>
                                        <td>{{$partner->name}}</td>
                                        <td>{{$partner->security_no}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    <h2>Trade references</h2>
                    <table class="table table-striped">
                            <thead>
                                <th>company name</th>
                                <th>contact name</th>
                                <th>telephone no</th>
                                <th>fax no</th>
                            </thead>
                            <tbody>
                                @foreach($trade_refs as $trade_ref)
                                    <tr>
                                        <td>{{$trade_ref->company_name}}</td>
                                        <td>{{$trade_ref->contact_name}}</td>
                                        <td>{{$trade_ref->telephone}}</td>
                                        <td>{{$trade_ref->fax}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    <h2>Billing information</h2>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th width="150">name</th>
                                    <td>{{$billing->name}}</td>
                                </tr>
                                <tr>
                                    <th>address </th>
                                    <td>{{$billing->address}}</td>
                                </tr>
                                <tr>
                                    <th>state </th>
                                    <td>{{$billing->state}}</td>
                                </tr>
                                <tr>
                                    <th>city </th>
                                    <td>{{$billing->city}}</td>
                                </tr>
                                <tr>
                                    <th>zipcode</th>
                                    <td>{{$billing->zip_code}}</td>
                                </tr>
                                <tr>
                                    <th>telephone</th>
                                    <td>{{$billing->telephone}}</td>
                                </tr>
                                <tr>
                                    <th>fax</th>
                                    <td>{{$billing->fax}}</td>
                                </tr>
                            </tbody>
                        </table>

                    <h2>Shipping information</h2>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th width="150">name</th>
                                    <td>{{$shipping->name}}</td>
                                </tr>
                                <tr>
                                    <th>address </th>
                                    <td>{{$shipping->address}}</td>
                                </tr>
                                <tr>
                                    <th>state </th>
                                    <td>{{$shipping->state}}</td>
                                </tr>
                                <tr>
                                    <th>city </th>
                                    <td>{{$shipping->city}}</td>
                                </tr>
                                <tr>
                                    <th>zipcode</th>
                                    <td>{{$shipping->zip_code}}</td>
                                </tr>
                                <tr>
                                    <th>telephone</th>
                                    <td>{{$shipping->telephone}}</td>
                                </tr>
                                <tr>
                                    <th>fax</th>
                                    <td>{{$shipping->fax}}</td>
                                </tr>
                            </tbody>
                        </table>

                    <h2>Bank reference</h2>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th width="150">name</th>
                                    <td>{{$bank->name}}</td>
                                </tr>
                                <tr>
                                    <th>address </th>
                                    <td>{{$bank->address}}</td>
                                </tr>
                                <tr>
                                    <th>state </th>
                                    <td>{{$bank->state}}</td>
                                </tr>
                                <tr>
                                    <th>city </th>
                                    <td>{{$bank->city}}</td>
                                </tr>
                                <tr>
                                    <th>zipcode</th>
                                    <td>{{$bank->zip_code}}</td>
                                </tr>
                                <tr>
                                    <th>telephone</th>
                                    <td>{{$bank->telephone}}</td>
                                </tr>
                                <tr>
                                    <th>fax</th>
                                    <td>{{$bank->fax}}</td>
                                </tr>
                            </tbody>
                        </table>
                    
                </div> 
            </div>
        </div>
    </div>
    <div class="col-md-3" style="position: relative;">
        <div id="tocify"></div>
    </div>
</div>
@push('show_user')
    <script type="text/javascript" src="{{URL::asset('js/plugins/tocify/jquery.tocify.min.js')}}"></script>
    <script>
        $(function() {
            var toc = $("#tocify").tocify({context: ".tocify-content", showEffect: "fadeIn",extendPage:false,selectors: "h2, h3, h4" });
        });
    </script>
@endpush
@endsection
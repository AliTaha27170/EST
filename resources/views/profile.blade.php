@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{URL::asset('user/css/CreateAccount.css')}}">

<div class="x-body">
    <img src="{{URL::asset('user/img/logo.png')}}" height="110" style="display: block; margin: 5px auto;" alt="">
    <div>
        <h3>Your Account</h3>
        <a href="/business/{{$user->id}}/edit" class="mbtn5" >Edit</a>
    </div>

    <hr>
    
    
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="section-parent">
                    <h4>Company Information:</h4>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Name</label>
                    <div class="col-sm-8">
                        <label for="">{{$user->name}}</label>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Trade Name</label>
                    <div class="col-sm-8">
                        <label for="">{{$user->trade_name}}</label>
                    </div>
                </div>


                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Contact Name</label>
                    <div class="col-sm-8">
                        <label for="">{{$user->contact_name}}</label>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="email">E-Mail Address</label>
                    <div class="col-sm-8">
                        <label for="">{{$user->email}}</label>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Establishment year</label>
                    <div class="col-sm-8">
                        <label for="">{{$user->est_year}}</label>
                    </div>
                </div>


            </div>

            <div class="col-md-6">
                <div style="visibility: hidden" class="section-parent">
                    <h4>Ccc</h4>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Type of business</label>
                    <div class="col-sm-8">
                        <div class="">
                            <ul class="ks-cboxtags">
                                @foreach($type as $t)
                                <li>
                                    <label for=""><span class="fa fa-check" aria-hidden="true"></span></label>
                                    <label for="c1">{{$t}}</label>
                                </li>
                                @endforeach
                                
                            </ul>

                        </div>

                    </div>
                </div>

                
                <div class="row form-group">
                        <label class="col-sm-4 col-form-label" for="name">bank account no</label>
                        <div class="col-sm-8">
                            <label for="">{{$user->bank_acc_no}}</label>
                        </div>
                    </div>
    
                    <div class="row form-group">
                        <label class="col-sm-4 col-form-label" for="name">tax id no</label>
                        <div class="col-sm-8">
                            <label for="">{{$user->tax_id_no}}</label>
                        </div>
                    </div>
    
                    <div class="row form-group">
                        <label class="col-sm-4 col-form-label" for="name">sales tax no</label>
                        <div class="col-sm-8">
                            <label for="">{{$user->sales_tax_no}}</label>
                        </div>
                    </div>

            </div>
        </div>
        <hr>
        <div class="row">
            @if (count($partnership))
            <div class="col-md-6">
                <div class="section-parent">
                    <h4>Partnership:</h4>

                </div>
                @foreach($partnership as $partner)
                <ul class="partners-ul">
                    <li class="base-item">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label" for="name"> name</label>
                            <div class="col-sm-8">
                                <label for="">{{$partner->name}}</label>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label" for="name">social security no</label>
                            <div class="col-sm-8">
                                <label for="">{{$partner->security_no}}</label>
                            </div>
                        </div>


                    </li>
                </ul>
                @endforeach
                {{-- <ul class="partners-ul-other">
                    <!-- this list for additional partners -->
                </ul> --}}

            </div>
            @endif
            @if (count($trade_refs))
            <div class="col-md-6">
                <div class="section-parent">
                    <h4>Trade References:</h4>
                </div>
                @foreach($trade_refs as $trade_ref)
                <ul class="trc-ul">
                    <li class="base-item">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label" for="name">company name</label>
                            <div class="col-sm-8">
                                <label for="">{{$trade_ref->company_name}}</label>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label" for="name">Contact name</label>
                            <div class="col-sm-8">
                                <label for="">{{$trade_ref->contact_name}}</label>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label" for="name">Telephone</label>
                            <div class="col-sm-8">
                                <label for="">{{$trade_ref->telephone}}</label>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label" for="name">Fax</label>
                            <div class="col-sm-8">
                                <label for="">{{$trade_ref->fax}}</label>
                            </div>
                        </div>

                    </li>
                </ul>
                @endforeach
                {{-- <ul class="trc-ul-other">
                    <!-- this list for additional partners -->
                </ul> --}}
            </div>
            @endif
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="section-parent">
                    <h4>Billing Information:</h4>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Business name</label>
                    <div class="col-sm-8">
                        <label for="">{{$billing->name}}</label>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Billing address</label>
                    <div class="col-sm-8">
                        <label for="">{{$billing->address}}</label>
                    </div>
                </div>


                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">state</label>
                    <div class="col-sm-8">
                        <label for="">{{$billing->state}}</label>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">city</label>
                    <div class="col-sm-8">
                        <label for="">{{$billing->city}}</label>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">zipcode</label>
                    <div class="col-sm-8">
                        <label for="">{{$billing->zip_code}}</label>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">telephone</label>
                    <div class="col-sm-8">
                        <label for="">{{$billing->telephone}}</label>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">fax</label>
                    <div class="col-sm-8">
                        <label for="">{{$billing->fax}}</label>
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                <div class="section-parent">
                    <h4>Shipping Information</h4>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Business name</label>
                    <div class="col-sm-8">
                        <label for="">{{$shipping->name}}</label>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Shipping address</label>
                    <div class="col-sm-8">
                        <label for="">{{$shipping->address}}</label>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name"> state</label>
                    <div class="col-sm-8">
                        <label for="">{{$shipping->state}}</label>
                    </div>
                </div>


                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name"> city</label>
                    <div class="col-sm-8">
                        <label for="">{{$shipping->city}}</label>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name"> zipcode</label>
                    <div class="col-sm-8">
                        <label for="">{{$shipping->zip_code}}</label>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name"> telephone</label>
                    <div class="col-sm-8">
                        <label for="">{{$shipping->telephone}}</label>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name"> fax</label>
                    <div class="col-sm-8">
                        <label for="">{{$shipping->fax}}</label>
                    </div>
                </div>


            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="section-parent">
                    <h4>Bank Reference:</h4>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Bank name</label>
                    <div class="col-sm-8">
                        <label for="">{{$bank->name}}</label>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Bank address</label>
                    <div class="col-sm-8">
                        <label for="">{{$bank->address}}</label>
                    </div>
                </div>


                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name"> state</label>
                    <div class="col-sm-8">
                        <label for="">{{$bank->state}}</label>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name"> city</label>
                    <div class="col-sm-8">
                        <label for="">{{$bank->city}}</label>
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                <div style="visibility: hidden" class="section-parent">
                    <h4></h4>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Bank zipcode</label>
                    <div class="col-sm-8">
                        <label for="">{{$bank->zip_code}}</label>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Bank telephone</label>
                    <div class="col-sm-8">
                        <label for="">{{$bank->telephone}}</label>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Bank fax</label>
                    <div class="col-sm-8">
                        <label for="">{{$bank->fax}}</label>
                    </div>
                </div>


            </div>
        </div>
        <hr>
        
   


</div>
@push('page_scripts')
<script src="{{URL::asset('user/js/CreateAccount.js')}}"></script>
@endpush
@endsection

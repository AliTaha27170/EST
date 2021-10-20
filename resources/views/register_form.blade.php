@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{URL::asset('user/css/CreateAccount.css')}}">

<div class="x-body">
    <img src="{{URL::asset('user/img/logo.png')}}" height="110" style="display: block; margin: 5px auto;" alt="">

    <h3>New Account Application</h3>
    <hr>
    @if (!session('message'))
    <form method="POST" action="{{ route('business.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="section-parent">
                    <h4>Company Information:</h4>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Name</label>
                    <div class="col-sm-8">
                        <input type="text" id="name" name="name" class="input1" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Trade Name</label>
                    <div class="col-sm-8">
                        <input type="text" id="trade_name" class="input1" name="trade_name" value="{{ old('trade_name') }}" required autofocus>
                        @if ($errors->has('trade_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('trade_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>


                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Contact Name</label>
                    <div class="col-sm-8">
                        <input type="text" id="contact_name" class="input1" name="contact_name" value="{{ old('contact_name') }}" required autofocus>
                        @if ($errors->has('contact_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('contact_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="email">E-Mail Address</label>
                    <div class="col-sm-8">
                        <input type="email" id="email" value="{{ old('email') }}" class="input1{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required autofocus>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Establishment year</label>
                    <div class="col-sm-8">
                        <input type="text" id="est_year" class="input1" name="est_year" value="{{ old('est_year') }}" required autofocus>
                        @if ($errors->has('est_year'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('est_year') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">bank account no</label>
                    <div class="col-sm-8">
                        <input type="text" id="bank_acc_no" class="input1" value="{{ old('bank_acc_no') }}" name="bank_acc_no" required autofocus>
                        @if ($errors->has('bank_acc_no'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('bank_acc_no') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">tax id no</label>
                    <div class="col-sm-8">
                        <input type="text" id="name" name="tax_id_no" class="input1" value="{{ old('tax_id_no') }}" required autofocus>
                        @if ($errors->has('tax_id_no'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('tax_id_no') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">sales tax no</label>
                    <div class="col-sm-8">
                        <input type="text" id="name" class="input1" name="sales_tax_no" value="{{ old('sales_tax_no') }}" required autofocus>
                        @if ($errors->has('sales_tax_no'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('sales_tax_no') }}</strong>
                        </span>
                        @endif
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
                                <li>
                                    <input type="checkbox" id="c1" name="type_of_business0" value="1">
                                    <label for="c1">Supermarket</label>
                                </li>

                                <li>
                                    <input type="checkbox" id="c2" name="type_of_business1" value="1">
                                    <label for="c2">Restaurant</label>
                                </li>

                                <li>
                                    <input type="checkbox" id="c3" name="type_of_business2" value="1">
                                    <label for="c3">Gourmet Shop</label>
                                </li>

                                <li>
                                    <input type="checkbox" id="c4" name="type_of_business3" value="1">
                                    <label for="c4">Gift Basket</label>
                                </li>

                                <li>
                                    <input type="checkbox" id="c5" name="type_of_business4" value="1">
                                    <label for="c5">Deli/ Grocery</label>
                                </li>

                                <li>
                                    <input type="checkbox" id="c6" name="type_of_business5" value="1">
                                    <label for="c6">e-Business</label>
                                </li>

                                <li>
                                    <input type="checkbox" id="c7" name="type_of_business6" value="1">
                                    <label for="c7">Grocery Distributor</label>
                                </li>

                                <li>
                                    <input type="checkbox" id="c8" name="type_of_business7" value="1">
                                    <label for="c8">Deli Distributor</label>
                                </li>

                                <li>
                                    <input type="checkbox" id="c9" name="type_of_business8" value="1">
                                    <label for="c9">Full Line Distributor</label>
                                </li>

                                <li>
                                    <input type="checkbox" id="c10" name="type_of_business9" value="1">
                                    <label for="c10">Institution</label>
                                </li>
                                <!-- 
                                    <li class="other-cat">
                                        <input type="checkbox" id="c11" name="type_of_business10" value="1">
                                        <label for="c11">+ Other</label>
                                        <input name="other_type" class="other-cat-closed" placeholder="Enter your type" type="text">

                                    </li> -->
                            </ul>
                            <div style="margin-top: 15px">
                                <input name="type_of_business10" type="checkbox" id="o-t"> <label for="o-t">Other</label>
                                <input name="other_type" class="input1 o-t-i other-cat-closed" placeholder="Other Type" type="text">

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="section-parent">
                    <h4>If Partnership or individual:</h4>
                    <button class="mbtn4" type="button" onclick="CopyItem(this)" data-ul=".partners-ul">+ Add
                        Partner</button>
                </div>

                <ul class="partners-ul">
                    <li class="base-item">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label" for="name"> name</label>
                            <div class="col-sm-8">
                                <input type="text" name="partnership_name[]" id="name" class="input1">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label" for="name">social security no</label>
                            <div class="col-sm-8">
                                <input type="text" name="partnership_value[]" id="name" class="input1">
                            </div>
                        </div>

                        <button type="button" class="remove-item-btn" onclick="RemoveItem(this)">
                            <span class="fa fa-minus" style="font-size: 10px;"></span>&nbsp;&nbsp;Remove
                        </button>
                    </li>
                </ul>

                <ul class="partners-ul-other">
                    <!-- this list for additional partners -->
                </ul>

            </div>

            <div class="col-md-6">
                <div class="section-parent">
                    <h4>Trade References:</h4>
                    <button class="mbtn4" type="button" onclick="CopyItem(this)" data-ul=".trc-ul">+ Add
                        Company</button>
                </div>

                <ul class="trc-ul">
                    <li class="base-item">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label" for="name">company name</label>
                            <div class="col-sm-8">
                                <input type="text" id="name" class="input1" name="trade_ref_company[]">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label" for="name">Contact name</label>
                            <div class="col-sm-8">
                                <input type="text" id="name" class="input1" name="trade_ref_contact[]">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label" for="name">Telephone</label>
                            <div class="col-sm-8">
                                <input type="text" id="name" class="input1" name="trade_ref_tel[]">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label" for="name">Fax</label>
                            <div class="col-sm-8">
                                <input type="text" id="name" class="input1" name="trade_ref_fax[]">
                            </div>
                        </div>

                        <button type="button" class="remove-item-btn" onclick="RemoveItem(this)">
                            <span class="fa fa-minus" style="font-size: 10px;"></span>&nbsp;&nbsp;Remove
                        </button>
                    </li>
                </ul>

                <ul class="trc-ul-other">
                    <!-- this list for additional partners -->
                </ul>
            </div>
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
                        <input type="text" id="name" value="{{ old('billing_name') }}" class="input1" name="billing_name" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Billing address</label>
                    <div class="col-sm-8">
                        <input type="text" id="name" value="{{ old('billing_address') }}" class="input1" name="billing_address" required autofocus>
                    </div>
                </div>


                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">state</label>
                    <div class="col-sm-8">
                        <input type="text" id="name" value="{{ old('billing_state') }}" class="input1" name="billing_state" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">city</label>
                    <div class="col-sm-8">
                        <input type="text" id="name" value="{{ old('billing_city') }}" class="input1" name="billing_city" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">zipcode</label>
                    <div class="col-sm-8">
                        <input type="text" id="name" class="input1" value="{{ old('billing_zipcode') }}" name="billing_zipcode" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">telephone</label>
                    <div class="col-sm-8">
                        <input type="text" id="name" class="input1" value="{{ old('billing_tel') }}" name="billing_tel" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">fax</label>
                    <div class="col-sm-8">
                        <input type="text" id="name" class="input1" value="{{ old('billing_fax') }}" name="billing_fax">
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
                        <input type="text" id="name" class="input1" value="{{ old('shipping_name') }}" name="shipping_name" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Shipping address</label>
                    <div class="col-sm-8">
                        <input type="text" id="name" class="input1" value="{{ old('shipping_address') }}" name="shipping_address" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name"> state</label>
                    <div class="col-sm-8">
                        <input type="text" id="name" class="input1" value="{{ old('shipping_state') }}" name="shipping_state" required autofocus>
                    </div>
                </div>


                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name"> city</label>
                    <div class="col-sm-8">
                        <input type="text" id="name" class="input1" value="{{ old('shipping_city') }}" name="shipping_city" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name"> zipcode</label>
                    <div class="col-sm-8">
                        <input type="text" id="name" class="input1" value="{{ old('shipping_zipcode') }}" name="shipping_zipcode" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name"> telephone</label>
                    <div class="col-sm-8">
                        <input type="text" id="name" class="input1" value="{{ old('shipping_tel') }}" name="shipping_tel" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name"> fax</label>
                    <div class="col-sm-8">
                        <input type="text" id="name" class="input1" value="{{ old('shipping_fax') }}" name="shipping_fax" >
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
                        <input type="text" id="name" class="input1" value="{{ old('bank_name') }}" name="bank_name" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Bank address</label>
                    <div class="col-sm-8">
                        <input type="text" id="name" class="input1" value="{{ old('bank_address') }}" name="bank_address" required autofocus>
                    </div>
                </div>


                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name"> state</label>
                    <div class="col-sm-8">
                        <input type="text" id="name" class="input1" value="{{ old('bank_state') }}" name="bank_state" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name"> city</label>
                    <div class="col-sm-8">
                        <input type="text" id="name" class="input1" value="{{ old('bank_city') }}" name="bank_city" required autofocus>
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                <div style="visibility: hidden" class="section-parent">
                    <h4>Shipping Information</h4>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Bank zipcode</label>
                    <div class="col-sm-8">
                        <input type="text" id="name" class="input1" value="{{ old('bank_zipcode') }}" name="bank_zipcode" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Bank telephone</label>
                    <div class="col-sm-8">
                        <input type="text" id="name" class="input1" value="{{ old('bank_tel') }}" name="bank_tel" >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Bank fax</label>
                    <div class="col-sm-8">
                        <input type="text" id="name" class="input1" value="{{ old('bank_fax') }}" name="bank_fax">
                    </div>
                </div>


            </div>
        </div>
        <hr>
        <button type="submit" class="submit-btn mbtn5 block-center">{{ __('Register') }}</button>
    </form>
    @else
    <div class="row">
        <div class="col-md-12">
            Thank yoy for registeration in our website, we will confirm you by email after making sure of the entered information.
        </div>
    </div>
    @endif


</div>
@push('page_scripts')
<script src="{{URL::asset('user/js/CreateAccount.js')}}"></script>
@endpush
@endsection

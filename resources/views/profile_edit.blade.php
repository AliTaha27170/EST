@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{URL::asset('user/css/CreateAccount.css')}}">

<div class="x-body">
    <img src="{{URL::asset('user/img/logo.png')}}" height="110" style="display: block; margin: 5px auto;" alt="">

    <h3>Edit your information</h3>
    <hr>
    
    <form method="POST" action="{{route('business.update',$user->id)}}">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-6">
                <div class="section-parent">
                    <h4>Company Information:</h4>
                </div>
                
                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Contact Name</label>
                    <div class="col-sm-8">
                        <input type="text" id="contact_name" class="input1" name="contact_name" value="{{$user->contact_name}}" required autofocus>
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
                        <input type="email"  disabled value="{{$user->email}}" class="input1{{ $errors->has('email') ? ' is-invalid' : '' }}" >
                       
                    </div>
                </div>

               

            </div>

            <div class="col-md-6">
                <div style="visibility: hidden" class="section-parent">
                    <h4>Ccc</h4>
                </div>
                <div class="row form-group">
                    <div class="col-sm-8">
                        <button type="button" class="submit-btn mbtn5 block-center" style="background:#001748" data-toggle="modal" data-target="#change-password-modal">Change password</button>
                    </div>
                </div>

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
                        <input type="text" value="{{$billing->name}}" class="input1" name="billing_name" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Billing address</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{$billing->address}}" class="input1" name="billing_address" required autofocus>
                    </div>
                </div>


                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">state</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{$billing->state}}" class="input1" name="billing_state" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">city</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{$billing->city}}" class="input1" name="billing_city" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">zipcode</label>
                    <div class="col-sm-8">
                        <input type="text" class="input1" value="{{$billing->zip_code}}" name="billing_zipcode" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">telephone</label>
                    <div class="col-sm-8">
                        <input type="text" class="input1" value="{{$billing->telephone}}" name="billing_tel" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">fax</label>
                    <div class="col-sm-8">
                        <input type="text" class="input1" value="{{$billing->fax}}" name="billing_fax">
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
                        <input type="text" class="input1" value="{{$shipping->name}}" name="shipping_name" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Shipping address</label>
                    <div class="col-sm-8">
                        <input type="text" class="input1" value="{{$shipping->address}}" name="shipping_address" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name"> state</label>
                    <div class="col-sm-8">
                        <input type="text" class="input1" value="{{$shipping->state}}" name="shipping_state" required autofocus>
                    </div>
                </div>


                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name"> city</label>
                    <div class="col-sm-8">
                        <input type="text" class="input1" value="{{$shipping->city}}" name="shipping_city" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name"> zipcode</label>
                    <div class="col-sm-8">
                        <input type="text" class="input1" value="{{$shipping->zip_code}}" name="shipping_zipcode" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name"> telephone</label>
                    <div class="col-sm-8">
                        <input type="text" class="input1" value="{{$shipping->telephone}}" name="shipping_tel" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name"> fax</label>
                    <div class="col-sm-8">
                        <input type="text" class="input1" value="{{$shipping->fax}}" name="shipping_fax" >
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
                        <input type="text"  class="input1" value="{{$bank->name}}" name="bank_name" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Bank address</label>
                    <div class="col-sm-8">
                        <input type="text" class="input1" value="{{$bank->address}}" name="bank_address" required autofocus>
                    </div>
                </div>


                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name"> state</label>
                    <div class="col-sm-8">
                        <input type="text" class="input1" value="{{$bank->state}}" name="bank_state" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name"> city</label>
                    <div class="col-sm-8">
                        <input type="text" class="input1" value="{{$bank->city}}" name="bank_city" required autofocus>
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
                        <input type="text" class="input1" value="{{$bank->zip_code}}" name="bank_zipcode" required autofocus>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Bank telephone</label>
                    <div class="col-sm-8">
                        <input type="text" class="input1" value="{{$bank->telephone}}" name="bank_tel" >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Bank fax</label>
                    <div class="col-sm-8">
                        <input type="text" class="input1" value="{{$bank->fax}}" name="bank_fax">
                    </div>
                </div>


            </div>
        </div>
        <hr>
        <button type="submit" class="submit-btn mbtn5 block-center">{{ __('edit') }}</button>
    </form>
    

</div>

<div class="modal fade" id="change-password-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" id="check_password" action="">
                @csrf
                <div class="modal-header">
                    <h4>Change your password</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="text-align: center">
                        <input  type="hidden" name="email" required value="{{$user->email}}">
                    <p>
                        <input class="input1"  type="password" name="password" required
                            placeholder="your old Password" style="width:90%">
                        <div id="error_message1"></div>
                    </p>
                </div>
                <div class="modal-footer">
                        <button type="submit" class="mbtn5"> {{ __('Next') }}</button>
                    <button type="button" class="mbtn4" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="change-password-modal-2" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="change_password" action="">
                    @csrf
                    <div class="modal-header">
                        <h4>Change your password</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" style="text-align: center">
                            <input  type="hidden" name="email1" required value="{{$user->email}}">
                        <p>
                            <input class="input1"  type="password" name="password" required
                                placeholder="new Password" style="width:90%">
                            
                        </p>
                        <p>
                            <input class="input1"  type="password" name="password_confirmation" required
                                placeholder="confirm Password" style="width:90%">
                                <div id="error_message2"></div>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="mbtn5"> {{ __('confirm') }}</button>
                        <button type="button" class="mbtn4" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@push('page_scripts')
<script src="{{URL::asset('user/js/CreateAccount.js')}}"></script>
<script>
    $("form#check_password").on('submit', function (e) {
        e.preventDefault();
        var data = $('#check_password').serialize();
        var changePasswordModal = $("#change-password-modal");
        var changePasswordModal2 = $("#change-password-modal-2");
        
        $.ajax({
            type: "post",
            url: '/check_password',
            data: data,
            // dataType: "json",
            success: function (data) {
                if(data.data_type=="error"){
                    $('#error_message1').html("<p style='color:#B71C1C;'>"+data.message+"</p>");
                }
                else if(data.data_type=="success"){
                    changePasswordModal.modal('hide');
                    changePasswordModal2.modal('show');
                }
                
            },
            error: function (error) {
                console.log(error);
            }
        });
    
    });
</script>
<script>
    $("form#change_password").on('submit', function (e) {
        e.preventDefault();
        var data = $('#change_password').serialize();
        // var changePasswordModal = $("#change-password-modal");
        var changePasswordModal2 = $("#change-password-modal-2");
        
        $.ajax({
            type: "post",
            url: '/change_password',
            data: data,
            // dataType: "json",
            success: function (data) {
                if(data.data_type=="error"){
                    $('#error_message2').html("<p style='color:#B71C1C;'>"+data.message.password[0]+"</p>");
                }
                if(data.data_type=="success"){
                    var success = '<div class="modal-header">'+
                    '<h4>Change your password</h4>'+
                    '<button type="button" class="close" data-dismiss="modal">&times;</button></div>'+
                    '<div class="modal-body" style="text-align: center">'+
                    '<p>Your password has been updated successfully</p>'+
                    '<div class="modal-footer">'+
                    '<button type="button" class="mbtn4" data-dismiss="modal">Close</button></div>';
                    

                    $('#change_password').html(success);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    
    });
</script>
@endpush
@endsection

@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{URL::asset('user/css/Contact.css')}}">
<div class="con-box">
    <div class="con-head">
        <img width="100" src="{{URL::asset('user/img/contact.svg')}}" alt="">
        <h1>Contact Us</h1>
    </div>

    <div class="con-group con-info-parent">

        <div class="row">
            <div class="col-md-6">NAJIB EST, INC.</div>
        </div>

        <div class="row">
            <div class="col-md-6">7184 TROY HILL DRIVE SUIT C.</div>
        </div>

        <div class="row">
            <div class="col-md-6">ELKRIDGE , MD 21075 USA</div>
        </div>

        <div class="row">
            <div class="col-md-6">General Information:</div>
            <div class="col-md-6">info@Najibest.Com</div>
        </div>

        <div class="row">
            <div class="col-md-6">Products Information:</div>
            <div class="col-md-6">products@Najibest.Com</div>
        </div>

        <div class="row">
            <div class="col-md-6">Suggestions Information:</div>
            <div class="col-md-6">suggestions@Najibest.Com</div>
        </div>

        <div class="row">
            <div class="col-md-6">Checking Your Order:</div>
            <div class="col-md-6">eorders@Najibest.Com</div>
        </div>

        <div class="row">
            <div class="col-md-6">Phone:</div>
            <div class="col-md-6">(301) 202-7905 or (410) 379-2267</div>
        </div>

        <div class="row">
            <div class="col-md-6">Fax:</div>
            <div class="col-md-6">(240) 337-6468</div>
        </div>
    </div>

    <div class="con-group">
        <h4>FOR ANY QUESTIONS TALK TO ONE OF OUR AGENTS</h4>
        <div class="row">
            <div class="col-md-4">
                <label>Customer Service Hours:</label>
            </div>

            <div class="col-md-8">
                <label>
                    Monday to Friday
                    <br>
                    9:00 AM to 5:00 PM
                    <br>
                    Eastem Time
                </label>
            </div>
        </div>
    </div>

    <div class="con-group">
        <div class="row contact-us">
            <div class="col-md-4">
                <label>Contact Us By Email:</label>
            </div>

            <div class="col-md-8">
                <form method="post" action="{{ route('contact.store') }}">
                    @csrf
                    @if (Auth::user())
                    <input type="text" class="input1" name="name" placeholder="Name" required>
                    @else
                    <input type="text" class="input1" name="uname" placeholder="Name" required>
                    @endif
                    <input type="email" class="input1" name="email" placeholder="Email" required>

                    @if (Auth::user())
                    <select class="input1" name="address_id" required>
                        <option value="" disabled selected>choose Address</option>
                        @foreach($addresses as $address)
                        <option value="{{$address->id}}">{{$address->name}}</option>
                        @endforeach
                    </select>
                    @else
                    <div class="a-text-parent">
                        <label>
                            <span class="fa fa-map-marker"></span>
                            <span class="a-text">Add New Address!</span>
                        </label>
                        <button onclick="FormAddAddress()" type="button" class="mbtn4 form-a-d-btn">Add</button>
                    </div>

                    <input hidden name="name" type="text" id="a-name" class="input1">
                    <input hidden name="address" type="text" id="a-address" class="input1">
                    <input hidden name="state" type="text" id="a-state" class="input1">
                    <input hidden name="city" type="text" id="a-city" class="input1">
                    <input hidden name="zip_code" type="text" id="a-zipcode" class="input1">
                    <input hidden name="telephone" type="text" id="a-telephone" class="input1">
                    <input hidden name="fax" type="text" id="a-fax" class="input1">
                    @endif
                    <textarea name="message" type="text" class="input1" placeholder="We Are Hearing..."></textarea>
                    <button class="mbtn2" type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>

    <div class="con-group">
        <h5 style="text-align: center;">Please Contact your Account Executive with any Questions.</h5>
        
    </div>

</div>

<!-- Address Modal -->
<div class="modal fade" id="address-modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h3 style="display: block; margin: auto">Add Address</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" style="text-align: center">
                <p>
                    <input type="text" name="name" placeholder="Name" id="a-d-name" class="input1">
                </p>
                <p>
                    <input type="text" name="address" placeholder="Address" id="a-d-address" class="input1">
                </p>
                <p>
                    <input type="text" name="state" placeholder="State" id="a-d-state" class="input1">
                </p>
                <p>
                    <input type="text" name="city" placeholder="City" id="a-d-city" class="input1">
                </p>
                <p>
                    <input type="text" name="zip_code" placeholder="ZIP Code" id="a-d-zipcode" class="input1">
                </p>
                <p>
                    <input type="text" name="telephone" placeholder="Telephone" id="a-d-telephone" class="input1"></p>
                <p>
                    <input type="text" name="fax" placeholder="Fax" id="a-d-fax" class="input1">
                </p>
            </div>

            <div class="modal-footer">
                <button class="mbtn5" onclick="ModalAddAddress()">Add Address</button>
            </div>

        </div>
    </div>
</div>
@push('page_scripts')
<script>
    function FormAddAddress() {
        if ($("#a-name").val() == "") {
            $("#address-modal").modal("show");
        } else {
            $(".form-a-d-btn").html("Add");
            $("#a-name").val("");
            $("#a-address").val("");
            $("#a-state").val("");
            $("#a-city").val("");
            $("#a-zipcode").val("");
            $("#a-telephone").val("");
            $("#a-fax").val("");
            $(".contact-us form .a-text-parent label .a-text").html("Add New Address!")
        }

    }

    function ModalAddAddress() {
        $("#a-name").val($("#a-d-name").val());
        $("#a-address").val($("#a-d-address").val());
        $("#a-state").val($("#a-d-state").val());
        $("#a-city").val($("#a-d-city").val());
        $("#a-zipcode").val($("#a-d-zipcode").val());
        $("#a-telephone").val($("#a-d-telephone").val());
        $("#a-fax").val($("#a-d-fax").val());

        $(".contact-us form .a-text-parent label .a-text").html($("#a-address").val() + ", " + $("#a-state").val() +
            ", " + $("#a-city").val())
        $("#address-modal").modal("hide");
        $(".form-a-d-btn").html("Remove");
    }

</script>
@endpush
@endsection

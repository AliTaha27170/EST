@extends('layouts.app')
@section('content')
<!-- <link rel="stylesheet" href="{{URL::asset('user/css/Contact.css')}}">
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

</div> -->

<!-- Address Modal -->
<!-- <div class="modal fade" id="address-modal">
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

</script> -->

 <link rel="stylesheet" href="{{URL::asset('user/css/contact-us.css')}}">
 <div class="Contact-container" id="main_contact_section">
  <div class="content">
    <div class="left-side">
      <div class="address details">
        <i class="fas fa-map-marker-alt"></i>
        <div class="topic">Address</div>
        <div class="text-one">7184 Troy Hill Drive SUIT C Elkridge MD 21075 USA</div>
      </div>
      <div class="phone details">
        <i class="fas fa-phone-alt"></i>
        <div class="topic">Phone</div>
        <div class="text-one">	(301) 202-7905 </div>
        <div class="text-two"> (410) 379-2267 </div>
      </div>
      <div class="Fax details">
      <i class="fas fa-fax"></i>
        <div class="topic">Fax</div>
        <div class="text-one">	(240) 337-6468 </div>
      </div>
      <div class="email details">
        <i class="fas fa-envelope"></i>
        <div class="topic">Email</div>
        <div class="text-one">Info@Najibest.Com</div>
        <div class="text-two">Products@Najibest.Com</div>
        <div class="text-three">Suggestions@Najibest.Com</div>
        <div class="text-four">Eorders@Najibest.Com</div>
      </div>
    </div>
    <div class="right-side">
      <div class="topic-text">Send us a message</div>
      <p>If you have any Question , you can send us message from here.<br> It's our pleasure to help you.</p>
      <form action="#" method="POST" action="{{ route('contact.store') }}">
        {{ csrf_field() }}
         <div class="input-box">
          <input type="text" placeholder="Enter Your name" name="mail">
        </div> 
        <div class="input-box">
          <input type="Email" placeholder="Enter Your Email" name="mail">
        </div>
        <div class="input-box message-box">
           <textarea name="message" value="message" id="message" class="form-control" rows="3" placeholder="Your Message" required></textarea>
        </div>
        <div class="button">
          <input type="submit" value="Send Now" >
        </div>
        <div class="customer-service">
            <h5>FOR ANY QUESTIONS TALK TO ONE OF OUR AGENTS</h5>
            <p>Customer Service Hours: Monday To Friday <br> 9:00 AM To 5:00 PM <br> Eastem Time</p>
        </div>
      </form>
    </div>
  </div>
  <h4>Please Contact Your Account Executive With Any Questions.</h4>
</div>
<!-- map -->
<div class="Contact-container"style="padding: 020px;">
<div class="google-maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4436.563288335262!2d-76.74920380408464!3d39.19409239099808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b7e1913f4b4fdb%3A0x18a1a674d9c0d7ad!2s7184%20Troy%20Hill%20Dr%2C%20Elkridge%2C%20MD%2021075%2C%20USA!5e0!3m2!1sen!2sro!4v1573996589257!5m2!1sen!2sro" frameborder="0" style="border:0; width:100%" allowfullscreen=""></iframe>
                    </div>
</div>
<!-- map -->


@endsection

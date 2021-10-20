<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Najib Email</title>
</head>

<body>
    <div style="overflow: hidden; background: #fff;">

        <img src="{{URL::asset('email/nlogo.png')}}"
            style="border-radius: 150px; border:#d1d1d1 1px solid; background: #fff; width: 60px; height: 60px; padding: 15px; display: block; margin: auto; position: relative; bottom: -30px">

        <div style="background-image: url('{{URL::asset('email/upperimage.jpg')}}'); background-size: cover; color: #fff; text-align: center;
                        padding-top: 45px; padding-bottom: 10px; text-shadow: rgb(75, 75, 75) 0 2px 5px">
            EMAIL VERIFICATION
        </div>

        <div style="display: flex; width: 100%">
            <div
                style="width: 7px; background-image: url('{{URL::asset('email/line.png')}}'); background-size: contain; background-repeat: repeat-y; background-position-x: right">
            </div>
            <div style="padding: 40px 8%; width: 98%;">
                Hello, {{$name}}
                <br><br>
                Registration Confirmed
                <br><br>
                Your Email is successfully verfied and, your password is <span style="color: #001748">{{$password}}</span>

                <br><br><br><br>

                <a href="{{url('verifyemail/'.$email_token)}}"
                    style="border: none; border-radius: 25px; color: #fff; background: #001748; padding: 15px 25px; width: 100px; 
                                display: block; text-align: center; margin: auto; text-decoration: none; box-shadow: #646464 0 2px 5px">Login</a>
            </div>
            <div
                style="width: 7px; background-image: url('{{URL::asset('email/line.png')}}'); background-size: contain;  background-repeat: repeat-y; background-position-x: left">
            </div>
        </div>

        <div style="background: #fff; border-top: #ddd 1px solid; box-shadow: #646464 0 -2px 5px; padding: 25px 1%;">
            <p style="margin: 0; font-size: 14px; text-align: center">You can find our products in sveral stores or call
                us to find out the nearest store and the nearest distributor with our goods</p>

            <br><br>
            <div style="text-align: center; width: 100%;">
                <div style="display: inline-block; margin-right: 5%">
                    <img width="15" src="{{URL::asset('email/phone.png')}}" style="vertical-align: top">&nbsp;
                    <div style="display: inline-block">
                        <p style="font-size: 13px; margin: 0; margin-bottom: 10px">(301) 202-7905</p>
                        <p style="font-size: 13px; margin: 0;">(401) 379-2267</p>
                    </div>
                </div>

                <div style="display: inline-block;">
                    <img width="15" src="{{URL::asset('email/marker.png')}}" style="vertical-align: top">&nbsp;
                    <div style="display: inline-block">
                        <p style="font-size: 13px; margin: 0; margin-bottom: 10px">7184 TROY HILL DRIVE SUIT C.</p>
                        <p style="font-size: 13px; margin: 0;">ELKRIDGE, MD 21075 USA</p>
                    </div>
                </div>
            </div>
        </div>


    </div>
</body>

</html>


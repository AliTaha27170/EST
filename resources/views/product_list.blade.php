<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL::asset('user/libs/bs4/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/css/styles.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/libs/fa4/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/css/productList.css')}}">
    <link rel="icon" href="{{URL::asset('user/img/ico.jpg')}}">
    <title>Product List</title>
</head>
<script>
    //function print
        function printDiv(divName) {
            document.getElementById("printbut").style.visibility = "hidden";
            var printContents = document.getElementById(divName).innerHTML;
            
            var originalContents = document.body.innerHTML;
    
            document.body.innerHTML = printContents;
    
            window.print();
    
            document.body.innerHTML = originalContents;
            document.getElementById("printbut").style.visibility = "visible";
        }
    </script>
<body>
<div id="allprod">
    <div class="con-box">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo-bg" style="background-image: url('{{URL::asset('user/img/logo.png')}}')"></div>
            </div>
            <div class="col-sm-6">
                <p>NAJIB EST, Inc.</p>
                <p>7184 TROY HILL DRIVE SUIT C.</p>
                <p>ELKRIDGE , MD 21075 USA</p>
                <p>Tel: (301) 202-7905 </p>
                <p>Fax: (240) 337-6468</p>
            </div>
        </div>
        <button type="button" id="printbut" class="btn btn-info" onclick="printDiv('allprod')"><span class="fa fa-print"></span><br> Print</button>

    </div>

    <div class="f-title">Food Products List</div>

    <table cellspacing="0" cellpadding="5" ID="Table2">
    @foreach($categories as $cat)
        <tr>
            <td class="productcategorytitle" colspan="3">
                {{$cat->name}}
            </td>
        </tr>
        @foreach($products as $product)
        @if($product->category_id == $cat->id)
        <tr valign="top">
            <td class="productlistitems">{{$product->code}}</td>
            <td class="productlistitems">
                    {{strip_tags(html_entity_decode($product->description))}}
            </td>
            <td class="productlistitems">{{$product->packing}}</td>
        </tr>
        @endif

        @endforeach
    @endforeach
    </table>
</div>

</body>

</html>

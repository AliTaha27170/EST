<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Cart</title>

    <link rel="stylesheet" href="libs/bs4/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/owl/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="libs/owl/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="libs/fa4/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="libs/sider/css/sidebar.min.css">
    <link rel="stylesheet" href="libs/nice_number/jquery.nice-number.min.css">

    <script src="libs/jquery/jquery.min.js"></script>
    <script src="libs/nice_number/jquery.nice-number.min.js"></script>
    <script src="libs/bs4/js/bootstrap.min.js"></script>
    <script src="libs/owl/owl.carousel.min.js"></script>
    <script src="libs/jquery_cookie/jquery.cookie.js"></script>
</head>

<body>
    <link rel="stylesheet" href="css/Cart.css">

    <div class="cart-body">
        <h3><span class="fa fa-shopping-cart"></span> My Cart</h3>
        <hr>
        <ul class="cart-list">


            <!-- ----- -->
            <!-- list item start -->
            <li data-item-id="id1">
                <img src="img/bg5.jpg">
                <div class="cart-details">
                    <p class="cart-brand">Brand Here</p>
                    <p class="cart-name" title="Food Name Here Food Name Here Food Name Here Food Name Here">
                        Food Name Here Food Name Here Food Name Here Food Name Here
                    </p>
                    <div class="cart-foot">
                        <p class="cart-item-num">#G6564</p>
                        <p class="cart-packing">
                            <span>Price: $150</span>
                        </p>
                        <div class="count-parent count-sm">
                            <input class="count-input" type="number" value="100">
                        </div>
                    </div>
                    <button class="del-btn"><span class="fa fa-close"></span></button>
                </div>
            </li>
            <!-- list item end -->
            <!-- ----- -->


        </ul>
        <hr>
        <button class="checkout mbtn5"><span class="fa fa-check"></span> CHECKOUT</button>
    </div>


    <!-- Done Modal -->
    <div class="modal fade" id="done-modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header" style="justify-content: center">
                    <h3 style="margin: 0;">Done Successfully</h3>
                </div>

                <div class="modal-body" style="text-align: center">
                    <p>Request has been submited successfully!</p>
                </div>

                <div class="modal-footer">
                    <button class="mbtn5" onclick="document.location.href = '/'">OK</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(".count-input").niceNumber();

        $(".del-btn").click(function(){
            var item = $(this).closest("li");

            //id of deleted item
            var id = item.attr("data-item-id");

            /*****************************
             *  ITEM DELETE              *
             *  AJAX REQUEST HERE        *
             *                           *
             *****************************/


            item.fadeOut(300, function(){
                $(this).remove();
            });
        })

        $(".checkout").click(function(){
            $(this).attr("disabled", true);
            var cartArray = [];
            var cartlist = $(".cart-list");
            var allItems = cartlist.find("li");
            allItems.each(function(){
                var itemObject = new Object();
                var item = $(this);
                itemObject.id = item.attr("data-item-id");
                itemObject.amount = item.find("input.count-input").val();
                cartArray.push(itemObject);
            });

            //json array contains id and amount of all items
            var json = JSON.stringify(cartArray);

            //delete this after work done
            alert(json);

            /*****************************
             *  CHECKOUT SUBMIT          *
             *  AJAX REQUEST HERE        *
             *                           *
             *****************************/

            //in ajax request success
            $("#done-modal").modal({backdrop: 'static', keyboard: false});

            //in ajax request failed (uncomment bellow)
            /*alert("Error, Please try again !");
            $(this).attr("disabled", false); */

        });
    </script>

</body>

</html>
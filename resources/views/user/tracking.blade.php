@include("main.head")
<div class="add-to-card-container">
    <div class="mobile-logo">
        <img src="{{asset('main/images/resturant.png')}}" alt="">
    </div>

    <div class="add-to-card-container-column001 flex-row-warp justify-center ">
        <h2>Order status</h2>

    </div>
    <div class="add-to-card-container2 justify-center">


        <div class="tracking">
            <li class="primary" id="Confirmed">Confirmed</li>

            <div class="mileSton" id="Processing-div"></div>
            <li class="" id="Processing">Processing</li>

            <div class="mileSton" id="Prepared-div"></div>
            <li class="" id="Prepared">Prepared</li>

            <div class="mileSton" id="Shipping-div"></div>
            <li class="" id="Shipping">Shipping</li>

            <div class="mileSton" id="Received-div"></div>
            <li class="" id="Received">Received</li>
        </div>
        <div class="tracking">

            <h4>Your order has been confirmed.</h4>
            <h4>Your order is processing.</h4>
            <h4>Your order has been prepared. Its ready for shippping.</h4>
            <h4>Your order is on the way. Please wait sometime.</h4>
            <h4>Did you received your order ? Then click yes . <button class="btn btn-secondary" id="yes">Yes</button></h4>


        </div>

    </div>
</div>
<script>
    $(document).ready(function() {
        $("#yes").click(function() {
            $("#yes").hide();
            var element01 = document.getElementById("Received");
            element01.classList.add("primary");
            var element02 = document.getElementById("Received-div");
            element02.classList.add("primary");

        });
    });

    if (<?php echo $tracking_details['processing'] ?> == 1) {
        var element01 = document.getElementById("Processing");
        element01.classList.add("primary");
        var element02 = document.getElementById("Processing-div");
        element02.classList.add("primary");
    }
    if (<?php echo $tracking_details['prepared'] ?> == 1) {
        var element01 = document.getElementById("Prepared");
        element01.classList.add("primary");
        var element02 = document.getElementById("Prepared-div");
        element02.classList.add("primary");
    }
    if (<?php echo $tracking_details['shipping'] ?> == 1) {
        var element01 = document.getElementById("Shipping");
        element01.classList.add("primary");
        var element02 = document.getElementById("Shipping-div");
        element02.classList.add("primary");
    }
    if (<?php echo $tracking_details['received'] ?> == 1) {
        var element01 = document.getElementById("Received");
        element01.classList.add("primary");
        var element02 = document.getElementById("Received-div");
        element02.classList.add("primary");
    }
</script>
@include("main.foot")
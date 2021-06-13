@include("main.head")
<div class="add-to-card-container">
    <div class="mobile-logo">
        <img src="{{asset('main/images/resturant.png')}}" alt="">
    </div>
    <div class="add-to-card-container2 justify-center">

        @foreach ($Orders as $Order)
        <?php 
        $processing=$prepared=$shipping=$received="";
        if($Order->tracking->received== 1){
            $received="selected";
        }
        else{
            if($Order->tracking->shipping== 1){
                $shipping="selected";
            }else{
                if($Order->tracking->prepared== 1){
                    $prepared="selected";
                }else{
                    if($Order->tracking->processing== 1){
                        $processing="selected";
                    }
                }
            }
        }
        ?>
        <div class="add-to-card-container-column001 flex-row-warp">
            <h3>Billing Name :<br>{{$Order->billing_name}}</h3>
            <h3>Billing Address :<br>{{$Order->billing_address}}</h3>
            <h3>Billing Phone :<br>{{$Order->billing_phone}}</h3>
            <h3>Pay Amount :<br>{{$Order->billing_total}}</h3>
            <h3>Order Time :<br>{{$Order->created_at}}</h3>
            <h3 class="text-center">Status<br>
                <a class="margin-2remall items-center">
                    <select id="tracking" onchange="statecChange(<?php echo $Order->id ?>)">
                        <option value="confirmed">Confirmed</option>
                        <option value="processing"<?php echo $processing ?>>Processing</option>
                        <option value="prepared" <?php echo $prepared ?>>Prepared</option>
                        <option value="shipping" <?php echo $shipping ?>>Shipping</option>
                        <option value="received" <?php echo $received ?>>Received</option>
                    </select>
                </a>
            </h3>

            <a class="margin-2remall items-center btn btn-black" href="{{ route('orderDetails',$Order->id)}}">Details</a>

        </div>

        @endforeach
    </div>
</div>
<script>
document.getElementById('tracking').getElementsByTagName('option')['prepared'].selected = 'selected'
    function statecChange(id) {
        var state = document.getElementById("tracking").value;

        // var xhr = new XMLHttpRequest();
        // xhr.onload = function() {
        //     // Process our return data
        //     if (xhr.status >= 200 && xhr.status < 300) {
        //         // What do when the request is successful

        //         console.log('success!',this.response);
        //     } else {
        //         // What do when the request fails
        //         console.log('The request failed!');
        //     }
        //     // Code that should run regardless of the request status
        //     console.log('This always runs...');
        // }
        // xhr.open('GET', 'all-orders/order-details/update-status/' + state + '/' + id, true);
        // xhr.send();

        $.ajax({
            type: 'GET',
            url: 'all-orders/order-details/update-status/' + state + '/' + id,
            dataType: 'json',
            success: function(data) {
                console.log('success!', data.order_id);
                $('#fixed').html('<div class="notification" id="cancel1" onclick="cancel(cancel1)"><img class="cancel" style="height:20px;" src="{{ asset("main/icons/cancel.svg")}}">Order status updated to ' + state + '</div>');
                
                setTimeout(() => {
                    $('#cancel1').hide();
                }, 2000);

            }
        });
    }
</script>

@include("main.foot")
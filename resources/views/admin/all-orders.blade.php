@include("main.head")
<div class="add-to-card-container">
    <div class="add-to-card-container2 justify-center">

        @foreach ($Orders as $Order)
        <div class="add-to-card-container-column001 flex-row-warp">
            <h3>Billing Name :<br>{{$Order->billing_name}}</h3>
            <h3>Billing Address :<br>{{$Order->billing_address}}</h3>
            <h3>Billing Phone :<br>{{$Order->billing_phone}}</h3>
            <h3>Pay Amount :<br>{{$Order->billing_total}}</h3>
            <h3>Order Time :<br>{{$Order->created_at}}</h3>
            <h3 class="text-center">Status<br>
                <a class="margin-2remall items-center"><select id="tracking">
                        <option value="confirmed">Confirmed</option>
                        <option value="processing">Processing</option>
                        <option value="prepared">Prepared</option>
                        <option value="shipping">Shipping</option>
                        <option value="received">Received</option>
                    </select> </a>
            </h3>

            <a class="margin-2remall items-center btn btn-black" href="{{ route('orderDetails',$Order->id)}}">Details</a>

        </div>
        @endforeach
    </div>
</div>
@include("main.foot")
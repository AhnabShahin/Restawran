@include("main.head")
<div class="add-to-card-container">
    <div class="mobile-logo">
        <img src="{{asset('main/images/resturant.png')}}" alt="">
    </div>


    <h2 class="flex justify-center">All Recent Orders</h2>
    <div class="add-to-card-container2 justify-center">


        @foreach ($Orders as $Order)

        <div class="add-to-card-container-column001 flex-row-warp">
            <h3>Invoivce No:<br>{{$Order->invoice_no}}</h3>
            <h3>Billing ame :<br>{{$Order->billing_name}}</h3>
            <h3>Billing Address :<br>{{$Order->billing_address}}</h3>
            <h3>Billing Phone :<br>{{$Order->billing_phone}}</h3>
            <h3>Pay Amount :<br>{{$Order->billing_total}}</h3>
            <h3>Order Time :<br>{{$Order->created_at}}</h3>


            <a class="margin-2remall items-center btn btn-black" href="{{ route('tracking',$Order->id)}}">Tracking</a>

        </div>
        @endforeach
    </div>
</div>
@include("main.foot")
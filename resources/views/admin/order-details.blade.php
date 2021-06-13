@include("main.head")
<div class="add-to-card-container">
<div class="mobile-logo">
        <img src="{{asset('main/images/resturant.png')}}" alt="">
    </div>
    <div class="add-to-card-container2 justify-center">
        <div class="add-to-card-container-column001 flex-row-warp">
            <h3>Image</h3>
            <h3>Name</h3>
            <h3>Price</h3>
            <h3>Quantity</h3>
            <h3>Total price</h3>


        </div>
        @foreach ($OrderDetails as $OrderDetail)
        <div class="add-to-card-container-column001 flex-row-warp">
        <h3>
            <div>
                <img class="img3" src="{{ asset('images/item/'.$OrderDetail->item_image_path) }}" alt="">
            </div>
        </h3>
            <h3>{{$OrderDetail->item_name}}</h3>
            <h3>{{$OrderDetail->item_price}}</h3>
            <h3>{{$OrderDetail->item_quantity}}</h3>
            <h3>{{$OrderDetail->total_price}}</h3>


        </div>
        @endforeach
    </div>
</div>
@include("main.foot")
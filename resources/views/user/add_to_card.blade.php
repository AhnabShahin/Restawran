@include("main.head")
<?php
$Bill = 0;

use App\Models\Item; ?>
<div class="add-to-card-container">
<div class="mobile-logo">
        <img src="{{asset('main/images/resturant.png')}}" alt="">
    </div>
    <div class="container">

        <div class="add-to-card-container2">
            <div>
                @foreach ($card_items as $card_item)
                <?php $item = Item::find($card_item->item_id); ?>

                <div class="add-to-card-container-column001 flex-row-warp">
                    <div>
                        <!-- <input type="checkbox"><br> -->
                        <img class="add-to-card-container-column001-cancel-img" src="{{ asset('main/icons/cancel.svg')}}">
                    </div>
                    <img class="add-to-card-container-column001-item-img" src="{{ asset('main/images/plate-1.png')}}" alt="">
                    <h3>{{$item->name}}</h3><br>

                    <h2> $ {{$item->price}}/-</h2>

                    <div class="add-to-card-container-column001-counter">
                        <div class="counter flex justify-center ">
                            <span class="down" onclick="decreaseCount(event, this)">-</span>
                            <input type="number" id="input{{$card_item->id}}" value="{{$card_item->quantity}}">
                            <span class="up" onclick="increaseCount(event, this)">+</span>
                        </div>
                        <script type="text/javascript">
                            function increaseCount(a, b) {
                                var input = b.previousElementSibling;
                                var value = parseInt(input.value, 10);
                                value = isNaN(value) ? 0 : value;
                                value++;
                                input.value = value;
                            }

                            function decreaseCount(a, b) {
                                var input = b.nextElementSibling;
                                var value = parseInt(input.value, 10);
                                if (value > 1) {
                                    value = isNaN(value) ? 0 : value;
                                    value--;
                                    input.value = value;
                                }
                            }
                        </script>
                    </div>

                    <a class="margin-2remall items-center btn btn-black" onclick="getinput()">Update</a>
                </div>
                @endforeach
            </div>
            <div class="add-to-card-container-column02">
                @foreach ($card_items as $card_item)
                <?php $item = Item::find($card_item->item_id);
                $Bill = $Bill + $card_item->total_price;
                ?>
                <h3 id="quantity{{$card_item->id}}"> Total Quantity : {{$card_item->quantity}}</h3>
                <h3>Item name : {{$item->name}}</h3>
                <h3 id="Tprice{{$card_item->id}}"> Total Price : {{$card_item->total_price}}</h3><br>
                @endforeach
                <script>
                    function addToCard(id, quantity) {

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: 'GET',
                            url: '/' + id + '/' + quantity + '/add-to-card',
                            dataType: 'json',
                            success: function(data) {

                                data.card_item
                                var i;
                                var bill = 0;
                                for (i = 0; i < data.card_item.length; i++) {
                                    // console.log(data.card_item[i].id)   
                                    $('#quantity' + data.card_item[i].id).html('Total Quantity : ' + data.card_item[i].quantity)
                                    $('#Tprice' + data.card_item[i].id).html('Total Price : ' + (data.card_item[i].price * data.card_item[i].quantity))
                                    bill = bill + (data.card_item[i].price * data.card_item[i].quantity)

                                }
                                $('#bill').html('Total bill : ' + bill)
                                $('#fixed').html('<div class="notification" id="cancel1" onclick="cancel(cancel1)"><img class="cancel" style="height:20px;" src="{{ asset("main/icons/cancel.svg")}}">' + data.addtocard + '</div>');

                                setTimeout(() => {
                                    $('#cancel1').hide();
                                }, 2000);

                            }
                        });
                    }

                    function getinput() {

                        var j;
                        for (j = 0; j < <?php echo $card_items->count() ?>; j++) {
                            var v = <?php echo $card_items ?>[j];

                            var a = document.getElementById("input" + v.id).value

                            addToCard(v.item_id, a)
                        }
                    }
                </script>
                <h3 id="bill"> In Total Bill : {{$Bill}}</h3>
                <div class="add-to-card flex justify-center">
                    <a onclick="shippingForm()" href="{{route('make-payment')}}">CheckOut</a>
                </div>
            </div>
        </div>


        <script>
            function stripeForm() {
                var y = document.getElementById("stripe-div");
                if (y.style.display === "block") {
                    y.style.display = "none";
                } else {
                    y.style.display = "block";
                }
            }
        </script>
        <script>
            function shippingForm() {
                var x = document.getElementById("shipping-form");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>
    </div>
</div>





@include("main.foot")
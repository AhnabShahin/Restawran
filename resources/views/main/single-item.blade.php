@include("main.head")
<div class="mobile-logo">
    <img src="./images/resturant.png" alt="">
</div>
<div class="food-detail">
    <div class="container">
        <section>
            <div class="container">
                <div class="food-detail-container">



                    <div class="food-img">
                        <img src="{{ asset('main/images/plate-1.png')}}">
                    </div>
                    <div class="food-quantity">
                        <h1>{{$itemInfo['name']}}</h1>
                        <div class="stars flex items-center">
                            <img src="{{ asset('main/icons/start-filled.svg')}}" alt="">
                            <img src="./icons/start-filled.svg" alt="">
                            <img src="./icons/start-filled.svg" alt="">
                            <img src="./icons/star-grey.svg" alt="">
                            <img src="./icons/star-grey.svg" alt="">
                            <span class="divider">|</span>
                            <h4>227 Ratings</h4>
                            <span class="divider">|</span>
                            <h4>22 Reviews</h4>
                        </div>
                        <div class="flex">
                            <div class="ingredents">
                                <h3>Food in ingredents</h3>
                                <ul>
                                    <li>tomato</li>
                                    <li>Ginger</li>
                                    <li>Suger</li>
                                    <li>Salt</li>
                                    <li>Spice</li>

                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="food-delivary">
                        <div class="flex items-center">
                            <img src="{{ asset('main/icons/price-tag.sv')}}'">
                            <h5>$ {{$itemInfo['price']}}</h5>
                            <h6>$ 125</h6>
                        </div>
                        <div class="order-container ">
                            <div class="flex justify-center ">
                                <h3>Quantity</h3>
                            </div>
                            <div class="counter flex justify-center ">
                                <span class="down" onClick='decreaseCount(event, this,)'>-</span>
                                <input type="number" id="input" value="{{$quantity}}">
                                <span class="up" onClick='increaseCount(event, this)'>+</span>
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


                                function addToCard(id, quantity) {
                                   
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    $.ajax({
                                        type: 'GET',
                                        url: '/'+id +'/'+ quantity + '/add-to-card',
                                        dataType: 'json',
                                        success: function(data) {
                                            $('#fixed').html('<div class="notification" id="cancel1" onclick="cancel(cancel1)"><img class="cancel" style="height:20px;" src="{{ asset("main/icons/cancel.svg")}}">' + data.addtocard + '</div>');

                                            setTimeout(() => {
                                                $('#cancel1').hide();
                                            }, 2000);

                                        }
                                    });
                                }
                                function getinput(){
                                    var a =document.getElementById("input").value
                                    addToCard(<?php echo $itemInfo['id']; ?>,a )
                                }
                            </script>
                            <div class="add-card">
                                <a  onclick="getinput()">Add To Card</a>
                                <a href="">Order Now
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="food-caption">
                        <h3>Food Details</h3>
                        <hr>
                        <p>{{$itemInfo['details']}}
                        </p>
                    </div>
                </div>
            </div>
    </div>
    </section>
</div>

<section class="top-products">
    <div class="container">
        <h1 class="section-heading">Food Suggest From Us</h1>
        <div class="slider">

            <div class="food-slider slick-initialized slick-slider">
                <div class="slick-list draggable">
                    <div class="slick-track" style="opacity: 1; width: 4422px; transform: translate3d(-2412px, 0px, 0px);">
                        <div class="food-card magic-shadow-sm slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" tabindex="-1" style="width: 348px;">
                            <div class="product-image flex items-center justify-center">
                                <img src="./images/plate-2.png" alt="">
                            </div>
                            <hr>
                            <div>
                                <h2 class="text-center">Russian Salad</h2>
                                <div class="stars flex justify-center items-center">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/star-grey.svg" alt="">
                                    <img src="./icons/star-grey.svg" alt="">
                                </div>
                                <div class="price text-center">
                                    $ 1.25
                                </div>
                                <div class="flex justify-center">
                                    <button tabindex="-1">
                                        <img src="./icons/cart-2.svg" alt="">
                                        <span>Add to cart</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="food-card magic-shadow-sm slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" tabindex="-1" style="width: 348px;">
                            <div class="product-image flex items-center justify-center">
                                <img src="./images/plate-3.png" alt="">
                            </div>
                            <hr>
                            <div>
                                <h2 class="text-center">Greek Salad</h2>
                                <div class="stars flex justify-center items-center">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/star-grey.svg" alt="">
                                    <img src="./icons/star-grey.svg" alt="">
                                </div>
                                <div class="price text-center">
                                    $ 1.25
                                </div>
                                <div class="flex justify-center">
                                    <button tabindex="-1">
                                        <img src="./icons/cart-2.svg" alt="">
                                        <span>Add to cart</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="food-card magic-shadow-sm slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" tabindex="-1" style="width: 348px;">
                            <div class="product-image flex items-center justify-center">
                                <img src="./images/plate-3.png" alt="">
                            </div>
                            <hr>
                            <div>
                                <h2 class="text-center">Cottage pie</h2>
                                <div class="stars flex justify-center items-center">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/star-grey.svg" alt="">
                                    <img src="./icons/star-grey.svg" alt="">
                                </div>
                                <div class="price text-center">
                                    $ 1.25
                                </div>
                                <div class="flex justify-center">
                                    <button tabindex="-1">
                                        <img src="./icons/cart-2.svg" alt="">
                                        <span>Add to cart</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="food-card magic-shadow-sm slick-slide" data-slick-index="0" aria-hidden="true" tabindex="-1" style="width: 348px;">
                            <div class="product-image flex items-center justify-center">
                                <img src="./images/plate-1.png" alt="">
                            </div>
                            <hr>
                            <div>
                                <h2 class="text-center">Summer Salad</h2>
                                <div class="stars flex justify-center items-center">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/star-grey.svg" alt="">
                                    <img src="./icons/star-grey.svg" alt="">
                                </div>
                                <div class="price text-center">
                                    $ 1.25
                                </div>
                                <div class="flex justify-center">
                                    <button tabindex="-1">
                                        <img src="./icons/cart-2.svg" alt="">
                                        <span>Add to cart</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="food-card magic-shadow-sm slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 348px;">
                            <div class="product-image flex items-center justify-center">
                                <img src="./images/plate-2.png" alt="">
                            </div>
                            <hr>
                            <div>
                                <h2 class="text-center">Russian Salad</h2>
                                <div class="stars flex justify-center items-center">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/star-grey.svg" alt="">
                                    <img src="./icons/star-grey.svg" alt="">
                                </div>
                                <div class="price text-center">
                                    $ 1.25
                                </div>
                                <div class="flex justify-center">
                                    <button tabindex="-1">
                                        <img src="./icons/cart-2.svg" alt="">
                                        <span>Add to cart</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="food-card magic-shadow-sm slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1" style="width: 348px;">
                            <div class="product-image flex items-center justify-center">
                                <img src="./images/plate-3.png" alt="">
                            </div>
                            <hr>
                            <div>
                                <h2 class="text-center">Greek Salad</h2>
                                <div class="stars flex justify-center items-center">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/star-grey.svg" alt="">
                                    <img src="./icons/star-grey.svg" alt="">
                                </div>
                                <div class="price text-center">
                                    $ 1.25
                                </div>
                                <div class="flex justify-center">
                                    <button tabindex="-1">
                                        <img src="./icons/cart-2.svg" alt="">
                                        <span>Add to cart</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="food-card magic-shadow-sm slick-slide slick-current slick-active" data-slick-index="3" aria-hidden="false" tabindex="0" style="width: 348px;">
                            <div class="product-image flex items-center justify-center">
                                <img src="./images/plate-3.png" alt="">
                            </div>
                            <hr>
                            <div>
                                <h2 class="text-center">Cottage pie</h2>
                                <div class="stars flex justify-center items-center">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/star-grey.svg" alt="">
                                    <img src="./icons/star-grey.svg" alt="">
                                </div>
                                <div class="price text-center">
                                    $ 1.25
                                </div>
                                <div class="flex justify-center">
                                    <button tabindex="0">
                                        <img src="./icons/cart-2.svg" alt="">
                                        <span>Add to cart</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="food-card magic-shadow-sm slick-slide slick-cloned slick-active" data-slick-index="4" aria-hidden="false" tabindex="-1" style="width: 348px;">
                            <div class="product-image flex items-center justify-center">
                                <img src="./images/plate-1.png" alt="">
                            </div>
                            <hr>
                            <div>
                                <h2 class="text-center">Summer Salad</h2>
                                <div class="stars flex justify-center items-center">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/star-grey.svg" alt="">
                                    <img src="./icons/star-grey.svg" alt="">
                                </div>
                                <div class="price text-center">
                                    $ 1.25
                                </div>
                                <div class="flex justify-center">
                                    <button tabindex="0">
                                        <img src="./icons/cart-2.svg" alt="">
                                        <span>Add to cart</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="food-card magic-shadow-sm slick-slide slick-cloned slick-active" data-slick-index="5" aria-hidden="false" tabindex="-1" style="width: 348px;">
                            <div class="product-image flex items-center justify-center">
                                <img src="./images/plate-2.png" alt="">
                            </div>
                            <hr>
                            <div>
                                <h2 class="text-center">Russian Salad</h2>
                                <div class="stars flex justify-center items-center">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/star-grey.svg" alt="">
                                    <img src="./icons/star-grey.svg" alt="">
                                </div>
                                <div class="price text-center">
                                    $ 1.25
                                </div>
                                <div class="flex justify-center">
                                    <button tabindex="0">
                                        <img src="./icons/cart-2.svg" alt="">
                                        <span>Add to cart</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="food-card magic-shadow-sm slick-slide slick-cloned" data-slick-index="6" aria-hidden="true" tabindex="-1" style="width: 348px;">
                            <div class="product-image flex items-center justify-center">
                                <img src="./images/plate-3.png" alt="">
                            </div>
                            <hr>
                            <div>
                                <h2 class="text-center">Greek Salad</h2>
                                <div class="stars flex justify-center items-center">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/star-grey.svg" alt="">
                                    <img src="./icons/star-grey.svg" alt="">
                                </div>
                                <div class="price text-center">
                                    $ 1.25
                                </div>
                                <div class="flex justify-center">
                                    <button tabindex="-1">
                                        <img src="./icons/cart-2.svg" alt="">
                                        <span>Add to cart</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="food-card magic-shadow-sm slick-slide slick-cloned" data-slick-index="7" aria-hidden="true" tabindex="-1" style="width: 348px;">
                            <div class="product-image flex items-center justify-center">
                                <img src="./images/plate-3.png" alt="">
                            </div>
                            <hr>
                            <div>
                                <h2 class="text-center">Cottage pie</h2>
                                <div class="stars flex justify-center items-center">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/start-filled.svg" alt="">
                                    <img src="./icons/star-grey.svg" alt="">
                                    <img src="./icons/star-grey.svg" alt="">
                                </div>
                                <div class="price text-center">
                                    $ 1.25
                                </div>
                                <div class="flex justify-center">
                                    <button tabindex="-1">
                                        <img src="./icons/cart-2.svg" alt="">
                                        <span>Add to cart</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        <div class="text-center btn-wrapper">
            <button class="btn btn-secondary">View More</button>
        </div>
    </div>
</section>
@include("main.foot")
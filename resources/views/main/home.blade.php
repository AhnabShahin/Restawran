@include("main.head")

<header class="hero flex items-center">
    <div class="container">
        <div class="welcome flex items-center">
            <span>Welcome to</span>
            <img src="{{asset('main/images/resturant.png')}}" alt="">
        </div>
        <h1>The World Best <span>Shoping</span> Website</h1>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
            been the
            industry's standard dummy.</p>
        <div>
            <button class="btn btn-primary">Read More</button>
            <button class="btn btn-secondary">Shop Now</button>
        </div>
        <div class="hero-image">
            <img src="{{asset('main/images/straw.png')}}" alt="">
        </div>
    </div>
</header>

<section class="top-products">
    <div class="container">
        <h1 class="section-heading">Top products</h1>
        <div class="slider">
            <button class="slider-btn prev-btn"><img src="{{asset('main/icons/pre.svg')}}" alt=""></button>
            <button class="slider-btn next-btn"><img src="{{asset('main/icons/next.svg')}}" alt=""></button>
            <div class="food-slider">
                @foreach ($allItem as $item)
                <div class="food-card magic-shadow-sm">
                    <div class="product-image flex items-center justify-center">
                        <img src="{{ asset('images/item/'.$item['image_path']) }}" alt="">
                    </div>
                    <hr>
                    <div>
                        <h2 class="text-center">{{$item['name']}}</h2>
                        <div class="stars flex justify-center items-center">
                            <img src="{{asset('main/icons/start-filled.svg')}}" alt="">
                            <img src="{{asset('main/icons/start-filled.svg')}}" alt="">
                            <img src="{{asset('main/icons/start-filled.svg')}}" alt="">
                            <img src="{{asset('main/icons/star-grey.svg')}}" alt="">
                            <img src="{{asset('main/icons/star-grey.svg')}}" alt="">
                        </div>
                        <div class="price text-center">
                            $ {{$item['price']}}
                        </div>
                        <div class="flex justify-center">
                            <button>
                                <img src="{{asset('main/icons/cart-2.svg')}}" alt="">
                                <span onclick="addToCard(<?php echo $item['id']; ?>,1)">Add to cart</span>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="text-center btn-wrapper">
                <a href="{{route('all-items')}}"><button class="btn btn-secondary">View More</button></a>
            </div>
        </div>
</section>
<section class="about-meal">
    <div class="container">
        <h1 class="section-heading">About Fresh Meal</h1>
        <div class="about-meal-wrap flex">
            <div class="flex-1">
                <img src="{{asset('main/images/yogurt.png')}}" alt="">
            </div>
            <div class="flex-1">
                <h2>Freshmeal is a long established fact that a reader will be distracted</h2>
                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                    piece of
                    classical Latin literature from 45 BC, making it over 2000 years old. Richard
                    McClintock, a
                    Latin professor at Hampden Sydney College in Virginia, The standard chunk of Lorem
                    Ipsum used
                    since the 1500s is reproduced below for those interested.</p>
                <button class="btn btn-secondary">Read More</button>
            </div>
        </div>
    </div>
</section>
<section class="our-services">
    <div class="container">
        <h1 class="section-heading">Our services</h1>
        <div class="card-wrapper flex">
            <div class="service-card magic-shadow-sm">
                <img class="icon" src="{{asset('main/icons/transport.svg')}}" alt="">
                <h2>Free Home delivery</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <button class="btn btn-secondary">Read More</button>
            </div>
            <div class="service-card magic-shadow-sm">
                <img class="icon" src="{{asset('main/icons/bag.svg')}}" alt="">
                <h2 class="text-primary">30 Days ReturnServices</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <button class="btn btn-primary">Read More</button>
            </div>
            <div class="service-card magic-shadow-sm">
                <img class="icon" src="{{asset('main/icons/usd.svg')}}" alt="">
                <h2>Money Back Guaranted</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <button class="btn btn-secondary">Read More</button>
            </div>
        </div>
    </div>
</section>
<section class="big-deal">
    <div class="container">
        <h1 class="section-heading text-pure">Big Deals of the Week</h1>
        <div class="timer">
            <div>
                <span>02</span>
                <span>Days</span>
            </div>
            <div>
                <span>24</span>
                <span>Hours</span>
            </div>
            <div>
                <span>55</span>
                <span>Minutes</span>
            </div>
            <div>
                <span>58</span>
                <span>Seconds</span>
            </div>
        </div>
    </div>
</section>

<section class="latest-news">
    <div class="container">
        <h1 class="section-heading">Lastest News from Blog</h1>
        <div class="article-wrapper">
            <article class="card magic-shadow-sm">
                <div>
                    <img src="{{asset('main/images/coffee.jpg')}}" alt="">
                </div>
                <div class="card-content">
                    <div class="post-meta flex items-center justify-between">
                        <span>July 03, 2017</span>
                        <div>
                            <span>Posted by <strong>FreshMeal</strong></span>
                            <span class="comment-count">12 Comments</span>
                        </div>
                    </div>

                    <h2>Lorem Ipsum is simply dummy text of the printing</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable
                        content of a
                        page when looking at its layout. The point of using Lorem Ipsum is that it has a
                        more
                        letters.</p>
                </div>
            </article>
            <article class="card magic-shadow-sm">
                <div>
                    <img src="{{asset('main/images/donut.jpg')}}" alt="">
                </div>
                <div class="card-content">
                    <div class="post-meta flex items-center justify-between">
                        <span>July 03, 2017</span>
                        <div>
                            <span>Posted by <strong>FreshMeal</strong></span>
                            <span class="comment-count">12 Comments</span>
                        </div>
                    </div>

                    <h2>Lorem Ipsum is simply dummy text of the printing</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable
                        content of a
                        page when looking at its layout. The point of using Lorem Ipsum is that it has a
                        more
                        letters.</p>
                </div>
            </article>
        </div>
        <div class="text-center btn-wrapper">
            <button class="btn btn-secondary">View All</button>
        </div>
    </div>
</section>
<script>

        function addToCard(id, quantity) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: id+'/'+quantity + '/add-to-card',
                dataType: 'json',
                success: function(data) {
                    $('#fixed').html('<div class="notification" id="cancel1" onclick="cancel(cancel1)"><img class="cancel" style="height:20px;" src="{{ asset("main/icons/cancel.svg")}}">' + data.addtocard + '</div>');

                    setTimeout(() => {
                        $('#cancel1').hide();
                    }, 2000);

                }
            });
        }
    </script>

@include("main.foot")
@include("main.head")
<div class="mobile-logo">
    <img src="./images/resturant.png" alt="">
</div>
<div class="maroon-background">
    <div class="container">
        <div class="search">
            <div class="flex justify-center">
                <h3>Search Your Favourite Food Items</h3>
            </div>
            <div id="search"> <input id="input" placeholder="Search...">
                <a href="">
                    <img src="icons/pizza.svg">
                </a>
            </div>
        </div>
    </div>
</div>

<h1 class="flex justify-center"">All Available Foods</h1><hr>


                <div class=" container ">
                        <div class=" img-container flex justify-center" id="myList">
    @foreach ($allItem as $item)
    <div class="all-food-card">
        <div class="food-image flex justify-center"><img src="{{ asset('images/item/'.$item['image_path']) }}" alt=""></div>
        <hr>
        <div class="flex justify-center">
            <h1><a href="{{ route('singleItemDetail',$item['id'])}}">{{$item['name']}}</a></h1>
        </div>
        <div class="stars flex justify-center items-center">
            <img src="{{ asset('main/icons/start-filled.svg') }}" alt="">
            <img src="{{ asset('main/icons/start-filled.svg') }}" alt="">
            <img src="{{ asset('main/icons/start-filled.svg') }}" alt="">
            <img src="{{ asset('main/icons/star-grey.svg') }}" alt="">
            <img src="{{ asset('main/icons/star-grey.svg') }}"" alt="">
        </div>
        <div class=" flex justify-center">
            <h3>${{$item['price']}}</h3>
        </div>
        <div class="add-to-card flex justify-center">
            <a onclick="addToCard(<?php echo $item['id']; ?>,1)"> Add To Card</a>
        </div>
    </div>
    @endforeach
    <script>
        $(document).ready(function() {

            var list = $("#myList .all-food-card");
            var numToShow = 4;
            var button = $("#loadMore");
            var numInList = list.length;
            list.hide();
            if (numInList > numToShow) {
                button.show();
            }
            list.slice(0, numToShow).show();

            button.click(function() {
                var showing = list.filter(':visible').length;
                list.slice(showing - 1, showing + numToShow).fadeIn();
                var nowShowing = list.filter(':visible').length;
                if (nowShowing >= numInList) {
                    button.hide();
                }
            });

        });

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


    </div>
    <div class=" text-center btn-wrapper margin-2rem">
        <button class="btn btn-secondary" id="loadMore">View more</button>
    </div>
    </div>
    <section class="subscribe">
        <div class="container flex items-center">
            <div>
                <img src="./images/rasberry.png" alt="">
            </div>
            <div>
                <h1>Subscribe to your newsletter</h1>
                <p>Lorem Ipsum as their default model text, and a search for 'lorem ipsum'
                    will uncover many
                    web sites
                    still in their infancy.</p>
                <div class="input-wrap">
                    <input type="email" placeholder="email@freshmeal.com">
                    <button>Subscribe</button>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-us flex">
        <div class="contact-info-wrapper">
            <h1 class="section-heading">Contact us</h1>
            <div class="contact-info">
                <div>
                    <div>
                        <img src="{{ asset('main/icons/phone-2.svg') }}" alt="">
                        <div>
                            <span>Call us:</span>
                            <span>(+84) 123 456 789</span>
                        </div>
                    </div>
                    <div>
                        <img src="{{ asset('main/icons/bag-2.svg') }}" alt="">
                        <div>
                            <span>E-mail ::</span>
                            <span>support@freshmeal.com</span>
                        </div>
                    </div>
                    <div>
                        <img src="{{ asset('main/icons/clock-2.svg') }}" alt="">
                        <div>
                            <span>Working Hours:</span>
                            <span>Mon - Sat (8.00am - 12.00am)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d206253.45012861438!2d-115.31508258571672!3d36.124918453865035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80beb782a4f57dd1%3A0x3accd5e6d5b379a3!2sLas%20Vegas%2C%20NV%2C%20USA!5e0!3m2!1sen!2sru!4v1580850940897!5m2!1sen!2sru" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="box">
                <h3>About us</h3>
                <p>It was popularised in the 1960 with the release of Latest sheets
                    containing Lorem Ipsum
                    passage.</p>
                <button class="btn btn-secondary">Read More</button>
            </div>
            <div class="box">
                <h3>Quik Links</h3>
                <ul>
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">About us</a>
                    </li>
                    <li>
                        <a href="#">Products</a>
                    </li>
                    <li>
                        <a href="#">Blog</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Gallery</a>
                    </li>
                    <li>
                        <a href="#">Contact us</a>
                    </li>

                </ul>
            </div>
            <div class="box">
                <h3>Follow Us</h3>
                <div>
                    <ul>
                        <li>
                            <a href="https://www.facebook.com/codersgyan">
                                <img src="{{ asset('main/icons/facebook.svg') }}" alt="">
                                <span>Facebook</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/CoderGyan">
                                <img src="{{ asset('main/icons/twitter.svg') }}" alt="">
                                <span>Twitter</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('main/icons/google.svg') }}" alt="">
                                <span>Google +</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/codersgyan/">
                                <img src="{{ asset('main/icons/instagram.svg') }}" alt="">
                                <span>Instagram</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="box instagram-api">
                <h3>Instagram</h3>
                <div class="post-wrap">
                    <div>
                        <img src="./images/food-table.jpg" alt="">
                    </div>
                    <div>
                        <img src="./images/food-table.jpg" alt="">
                    </div>
                    <div>
                        <img src="./images/food-table.jpg" alt="">
                    </div>
                    <div>
                        <img src="./images/food-table.jpg" alt="">
                    </div>
                    <div>
                        <img src="./images/food-table.jpg" alt="">
                    </div>
                    <div>
                        <img src="./images/food-table.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>
    </div>
    </div>

    @include("main.foot")
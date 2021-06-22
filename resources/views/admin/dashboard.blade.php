@include("main.head")
<div class="container">
    <div class="height">
        <h1 class="flex justify-center"">Admin Dashboard</h1><hr>
        @if(Session::get('itemInsert'))
        <h1 class=" flex justify-center"">{{Session::get('itemInsert')}}</h1>
        @endif

        <div class="container flex-row flex-warp justify-center">
            <div class="profile-img">

                <img src="{{ asset('images/admin/'.session('LoggedAdminInfo.image_path'))}}">
            </div>
            <div class="profile-details">
                <h3>Name : {{session('LoggedAdminInfo.name')}}</h3>
                <button id="add-item" class="btn btn-secondary my-1">Add Item</button>
                <a href="{{ route('allOrders')}}"><button id="add-item" class="btn btn-secondary my-1">All Orders</button></a>
                        <button class="btn btn-secondary my-1" id="aboutUsBtn">Edit AboutUs Description</button>
                        <button class="btn btn-secondary my-1" id="dailyServicesBtn">Edit Daily Services</button>
                        <button class="btn btn-secondary my-1" id="returnServicesBtn">Edit Return Services</button>
                        <button class="btn btn-secondary my-1" id="moneyBackServicesBtn">Edit Money Back Services</button>

                        <form method="post" action="{{route('updateAboutUs')}}" enctype="multipart/form-data">
                        @csrf
                            <!-- The Modal -->
                            <div id="aboutUs" class="modalAboutUs">
                                <!-- Modal content -->
                                <div class="modal-content">
                                    <h2 class="text-center">About us</h2>
                                    <div class="flex flex-direction justify-between">
                                        <h3>Heading of about us</h3>
                                        <span class="close">&times;</span>
                                    </div>
                                    <input type="text" name="title" required></input>
                                    <h3>Cover picture for about section</h3>
                                    <input type="file" name="image" required></input>
                                    <h3>Description of about us</h3>
                                    <textarea class="about-heading" name="description" required type="text"></textarea>
                                    <button class="btn" type="submit">Update Now</button>
                                </div>
                            </div>
                        </form>

                        <script>
                            // Get the modal
                            var modal = document.getElementById("aboutUs");
                            // Get the button that opens the modal
                            var btn = document.getElementById("aboutUsBtn");
                            // Get the <span> element that closes the modal
                            var span = document.getElementsByClassName("close")[0];
                            // When the user clicks on the button, open the modal
                            btn.onclick = function() {
                                modal.style.display = "block";
                            }
                            // When the user clicks on <span> (x), close the modal
                            span.onclick = function() {
                                modal.style.display = "none";
                            }
                        </script>

                        <form method="POST"  action="{{route('updateDailyServices')}}">
                        @csrf
                            <!-- The Modal -->
                            <div id="dailyServices" class="modalDailyServices">
                                <!-- Modal content -->
                                <div class="modal-content">
                                    <h2 class="text-center">Daily Services</h2>
                                    <div class="flex flex-direction justify-between">
                                        <h3>Heading of daily services</h3>
                                        <span class="close">&times;</span>
                                    </div>
                                    <input type="text" name="title"  required></input>
                                    <h3>Description of daily services</h3>
                                    <textarea class="about-heading" type="text" name="description"  required></textarea>
                                    <button class="btn" type="submit">Update Now</button>
                                </div>
                            </div>
                        </form>

                        <script>
                            // Get the modal
                            var modal1 = document.getElementById("dailyServices");
                            // Get the button that opens the modal
                            var btn1 = document.getElementById("dailyServicesBtn");
                            // Get the <span> element that closes the modal
                            var span1 = document.getElementsByClassName("close")[1];
                            // When the user clicks on the button, open the modal
                            btn1.onclick = function() {
                                modal1.style.display = "block";
                            }
                            // When the user clicks on <span> (x), close the modal
                            span1.onclick = function() {
                                modal1.style.display = "none";
                            }
                        </script>

                        <form  method="POST"  action="{{route('updateReturnServices')}}" >
                            <!-- The Modal -->
                            <div id="returnServices" class="modalReturnServices">
                            @csrf
                                <!-- Modal content -->
                                <div class="modal-content">
                                    <h2 class="text-center">Return Services</h2>
                                    <div class="flex flex-direction justify-between">
                                        <h3>Heading of return services</h3>
                                        <span class="close">&times;</span>
                                    </div>
                                    <input type="text" name="title" required></input>
                                    <h3>Description of return services</h3>
                                    <textarea class="about-heading" type="text" name="description"  required></textarea>
                                    <button class="btn" type="submit">Update Now</button>
                                </div>
                            </div>
                        </form>

                        <script>
                            // Get the modal
                            var modal2 = document.getElementById("returnServices");
                            // Get the button that opens the modal
                            var btn2 = document.getElementById("returnServicesBtn");
                            // Get the <span> element that closes the modal
                            var span2 = document.getElementsByClassName("close")[2];
                            // When the user clicks on the button, open the modal
                            btn2.onclick = function() {
                                modal2.style.display = "block";
                            }
                            // When the user clicks on <span> (x), close the modal
                            span2.onclick = function() {
                                modal2.style.display = "none";
                            }
                        </script>

                        <form method="POST"  action="{{route('updateMoneyBackServices')}}">
                        @csrf
                            <!-- The Modal -->
                            <div id="moneyBackServices" class="modalMoneyBackServicesBtn">
                                <!-- Modal content -->
                                <div class="modal-content">
                                    <h2 class="text-center">Money Back Services</h2>
                                    <div class="flex flex-direction justify-between">
                                        <h3>Heading of money Back services</h3>
                                        <span class="close">&times;</span>
                                    </div>
                                    <input type="text" name="title" required></input>
                                    <h3>Description of money back services</h3>
                                    <textarea class="about-heading" type="text" name="description"  required></textarea>
                                    <button class="btn" type="submit">Update Now</button>
                                </div>
                            </div>
                        </form>

                        <script>
                            // Get the modal
                            var modal3 = document.getElementById("moneyBackServices");
                            // Get the button that opens the modal
                            var btn3 = document.getElementById("moneyBackServicesBtn");
                            // Get the <span> element that closes the modal
                            var span3 = document.getElementsByClassName("close")[3];
                            // When the user clicks on the button, open the modal
                            btn3.onclick = function() {
                                modal3.style.display = "block";
                            }
                            // When the user clicks on <span> (x), close the modal
                            span3.onclick = function() {
                                modal3.style.display = "none";
                            }
                        </script>

                        <script>
                            // When the user clicks anywhere outside of the modal, close it
                            window.onclick = function(event) {
                                if (event.target == modal || event.target == modal1 || event.target == modal2 || event.target == modal3) {
                                    modal.style.display = "none";
                                    modal1.style.display = "none";
                                    modal2.style.display = "none";
                                    modal3.style.display = "none";
                                }
                            }
                        </script>


            </div>
            <div class="all-food-card-form" id="all-food-card-form">
                <div class="edit-item" id="add-item-form">
                    <form action="{{ route('itemPostSave')}}" class="" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3>Name Item </h3>
                        <div class="padding-tb-5">
                            <input class="edit-item-input" type="text" name="name">
                        </div>
                        <h3>Image</h3>
                        <div class="padding-tb-5">
                            <input class="edit-item-input" type="file" name="image">
                        </div>
                        <h3>Details</h3>
                        <div class="padding-tb-5">
                            <input class="edit-item-input-details" type="text" name="details">
                        </div>
                        <h3>Price</h3>
                        <div class="padding-tb-5">
                            <input class="edit-item-input" type="num" name="price">
                        </div>

                        <div class="">
                            <button class="button" type="submit"> Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                $("#add-item").click(function() {
                    $("#all-food-card-form").toggle();
                });
            </script>
        </div>
    </div>
</div>

<h3 class="flex justify-center" id="009">Recently Added Foods</h3>
<hr>


<div class=" container ">
    <div class=" img-container flex justify-center" id="myList">
        @foreach ($allItem as $item)
        <div class="all-food-card">
            <div class="food-image flex justify-center"><img src="{{ asset('images/item/'.$item['image_path']) }}" alt=""></div>
            <hr>
            <div class="flex justify-center">
                <h2><a href="{{ route('singleItemDetail',$item['id'])}}">{{$item['name']}}</a></h2>
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
                <a href="{{ route('itemDelete',$item['id'])}}">Delete</a>
                <a id="edit{{$item['id']}}">Edit</a>
            </div>
        </div>

        <div class="all-food-card-form" id="{{$item['id']}}">
            <div class="edit-item" id="add-item-form">
                <form action="{{ route('itemEditSave',$item['id'])}}" class="" method="post" enctype="multipart/form-data">
                    @csrf
                    <h3>Name Item </h3>
                    <div class="padding-tb-5">
                        <input class="edit-item-input" value="{{$item['name']}}" type="text" name="name">
                    </div>
                    <h3>Image</h3>
                    <div class="padding-tb-5">
                        <input class="edit-item-input" value="{{$item['image_path']}}" type="file" name="image">
                    </div>
                    <h3>Details</h3>
                    <div class="padding-tb-5">
                        <input class="edit-item-input-details" value="{{$item['details']}}" type="text" name="details">
                    </div>
                    <h3>Price</h3>
                    <div class="padding-tb-5">
                        <input class="edit-item-input" value="{{$item['price']}}" type="num" name="price">
                    </div>

                    <div class="">
                        <button class="button" type="submit"> Save</button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            $("#edit{{$item['id']}}").click(function() {

                $("#{{$item['id']}}").toggle();
            });
        </script>
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
        </script>

    </div>
    <div class=" text-center btn-wrapper margin-2rem">
        <button class="btn btn-secondary" id="loadMore">View more</button>
    </div>
</div>

@include("main.foot")
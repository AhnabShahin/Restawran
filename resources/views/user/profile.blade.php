@include("main.head")
<div class="container">
    <div class="height">
        <h1 class="flex justify-center"">User Profile</h1><hr>
@if(Session::get('itemInsert'))
<h1 class=" flex justify-center"">{{Session::get('itemInsert')}}</h1>
        @endif

        <div class="container flex-row flex-warp">
            <div class="profile-img">
       
                <img src="{{ asset('images/user/'.session('LoggedUserInfo.image_path'))}}">
            </div>
            <div class="profile-details">
                <h3>Name :  {{session('LoggedUserInfo.name')}}</h3>
                <button id="add-item" class="btn btn-secondary">Add Item</button>
                <a href="{{ route('user.allOrders')}}"><button id="add-item" class="btn btn-secondary">All Orders</button><a>
            </div>
            <div class="all-food-card-form" id="all-food-card-form" >
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
                        <input class="edit-item-input" value="{{$item['image_path']}}"  type="file" name="image">
                    </div>
                    <h3>Details</h3>
                    <div class="padding-tb-5">
                        <input class="edit-item-input-details" value="{{$item['details']}}"  type="text" name="details">
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
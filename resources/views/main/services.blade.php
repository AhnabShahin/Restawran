@include("main.head")
<section class="our-services">
    <div class="container">
        <h1 class="section-heading">Our Services</h1>

        <div class="Service-menu">
            <a class="active" id="Service-menu01">Delivery Services</a>
            <a class="" id="Service-menu02">Return Services</a>
            <a class="" id="Service-menu03">Money Back</a>

        </div>

        <div class="flex flex-warp justify-center">
            <div class="service-card magic-shadow-sm" id="delivery">
                <img class="icon" src="{{asset('main/icons/transport.svg')}}" alt="">
                <h2>{{$daily_service_info['title']}}</h2>
                <p>{{$daily_service_info['description']}}</p>

            </div>
            <div class="service-card magic-shadow-sm display-none" id="return">
                <img class="icon" src="{{asset('main/icons/bag.svg')}}" alt="">
                <h2 class="text-primary">{{$return_service_info['title']}}</h2>
                <p>{{$return_service_info['description']}}</p>

            </div>
            <div class="service-card magic-shadow-sm display-none" id="money">
                <img class="icon" src="{{asset('main/icons/usd.svg')}}"alt="">
                <h2>{{$money_back_service_info['title']}}</h2>
                <p>{{$money_back_service_info['description']}}</p>

            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $("#Service-menu01").click(function() {
            $("#Service-menu01").addClass("active");
            $("#Service-menu02").removeClass("active");
            $("#Service-menu03").removeClass("active");
            $("#delivery").show();
            $("#return").hide();
            $("#money").hide();
        });
        $("#Service-menu02").click(function() {
            $("#Service-menu01").removeClass("active");
            $("#Service-menu02").addClass("active");
            $("#Service-menu03").removeClass("active");
            $("#delivery").hide();
            $("#return").show();
            $("#money").hide();
        });
        $("#Service-menu03").click(function() {
            $("#Service-menu01").removeClass("active");
            $("#Service-menu02").removeClass("active");
            $("#Service-menu03").addClass("active");
            $("#delivery").hide();
            $("#return").hide();
            $("#money").show();
        });
    });
</script>
@include("main.foot")
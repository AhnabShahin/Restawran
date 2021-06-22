@include("main.head")

<section class="about-meal">
    <div class="container">

        <h1 class="section-heading">About Fresh Meal</h1>
        <div class="about-meal-wrap flex">
            <div class="flex-1">
                <img src="{{ asset('images/website/about-us/'.$about_us_info['image_path'])}}" alt="">
            </div>
            <div class="flex-1">
                <h2>{{$about_us_info['title']}}</h2>
                <p>{{$about_us_info['description']}}</p>
              
            </div>

    </div>
</section>
@include("main.foot")
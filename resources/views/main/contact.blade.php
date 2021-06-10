@include("main.head")
<section class="contact-us flex">
    <div class="contact-info-wrapper">
        <h1 class="section-heading">Contact us</h1>
        <div class="contact-info">
            <div class="container">
                <div class="letter-container">
                    <div class="letter-svg">
                        <img src="{{asset('main/icons/letter.svg')}}" alt="">
                    </div>
                    <form action="{{route('SaveContactMessage')}}" method="post">
                        <div class="letter-form">
                            <h1>Get Touch In</h1>
                            <div>
                                <input class="letter-form-name" type="text" name="name" placeholder="Your name..">
                            </div>
                            <div>
                                <input class="letter-form-email" type="email" name="email" placeholder="Example@gmail.com">
                            </div>
                            <div>
                                <textarea class="letter-form-messege" type="textarea" name="message" placeholder="Write Your message....."></textarea>
                            </div>
                            <div>
                                <button type="submit" class="letter-form-messege" type="textarea">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
@include("main.foot")
@extends('partials.base')


@section('content')
@include('partials.navbar')

<section class="About_Page">
    <div class="hero">
        <h1>Meet The Founders</h1>
    </div>

    <div class="container">
        <div class="team">
            <div class="story">
                <h2>Our Story</h2>
                <p>Founded in December 2023, Online Shop has been continously improved to ensure the online shopping is seemless. The platform was created on the belief that, via business, a positive impact on society should be made. We've grown to be a trusted place to shop by our clients and partners as well because when you shop with us, you receive an amazing-quality shopping experience and contribute to the growth of the platform so more shoppers like you can get the same experience.</p>
                <p>Online Shop is your one stop easy to shop platform. With our customers best experience in mind, we ensure the best quality services from browsing to shopping to payments.</p>
            </div>

            <h2>Meet the Team</h2>
            <div class="team_members">
                <div class="member">
                    <img src="{{ asset('assets/images/alex.jpg') }}" alt="Alex' Photo">
                    <p>Alex Aaqil</p>
                    <ul>
                        <li><a href="https://github.com/AlexAaqil/" target="_blank"><i class="fab fa-github"></i></a></li>
                        <li><a href="https://www.linkedin.com/in/alexwambui/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="https://www.instagram.com/alexaaqil/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>

                <div class="member">
                    <img src="{{ asset('assets/images/lawrence.png') }}" alt="Lawrence's Photo">
                    <p>Lawrence Mwangi</p>
                    <ul>
                        <li><a href="https://github.com/lawrencemwangi" target="_blank"><i class="fab fa-github"></i></a></li>
                        <li><a href="" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="https://www.instagram.com/lawrenzo.mwangi/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@include('partials.footer')
@endsection

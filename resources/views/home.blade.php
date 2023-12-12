@extends('partials.base')

@section('content')
@include('partials.navbar')
<main class="Homepage">
    <section class="Hero">
        <div class="container">
            <h1>Online Shop</h1>
            <div class="hero_btn">
                <a href="#">Start Shopping</a>
            </div>
        </div>
    </section>

    <!---About Section -->
    <section class="About">
        <div class="container">
            <div class="about_content_wrapper">
                <div class="about-content">
                    <i class="fas fa-desktop"></i>
                    <h3>Browse</h3>
                    <p>Choose your favorite product from our wide variety of available products.</p>
                </div>
                <div class="about-content">
                    <i class="fas fa-shopping-bag"></i>
                    <h3>Shop</h3>
                    <p>Select your favorite products and begin the shopping experience with ease.</p>
                </div>
                <div class="about-content">
                    <i class="fas fa-credit-card"></i>
                    <h3>Pay</h3>
                    <p>Complete your purchase with ease through mobile payments.</p>
                </div>
            </div>
        </div>
    </section>

      <!---Instagram Section -->
    <section class="Instagram">
        <div class="container">
            <h1>Instagram </h1>
            <div class="instragm-content-wrapper">
                <div class="instagram_content">
                    <img src="../assets/images/shop.jpg" alt="...">
                </div>
                <div class="instagram_content">
                    <img src="../assets/images/shop.jpg" alt="...">
                </div>
                <div class="instagram_content">
                    <img src="../assets/images/shop.jpg" alt="...">
                </div>
                <div class="instagram_content">
                    <img src="../assets/images/shop.jpg" alt="...">
                </div>
            </div>
            </div>
        </div>
    </section>
</main>

@include('partials.footer')
@endsection

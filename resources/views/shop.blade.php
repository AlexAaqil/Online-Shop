@extends('partials.base')

@section('content')
@include('partials.navbar')

<main class="Shop">
    <div class="topnav">
        <input type="text" name="search" id="myInput" placeholder="Search Products" onkeyup="searchFunction()">
    </div>

    <div class="container">
        <div class="sidenav">
            <div class="dropdown">
                <button class="drop_down_btn" onclick="dropDown(this)">Categories <i class="fa fa-caret-down"></i></button>
                <ul class="dropdown_list" id="dropdown_list">
                    <li>Computers</li>
                    <li>Electronics</li>
                    <li>Fashion</li>
                    <li>Furniture</li>
                </ul>
            </div>

            <div class="dropdown">
                <button class="drop_down_btn" onclick="dropDown(this)">Price <i class="fa fa-caret-down"></i></button>
                <ul class="dropdown_list" id="dropdown_list">
                    <li>50 - 100</li>
                    <li>101 - 300</li>
                </ul>
            </div>
        </div>

        <div class="products">
            <div class="products_wrapper">
                @foreach($products as $product)
                <div class="product searchable">
                    <div class="image">
                        <img src="{{ $product->getFirstImage() }}" alt="{{ $product->title }}">
                    </div>
                    <div class="details">
                        <div class="text">
                            <p>{{ $product->title }}</p>
                            <p class="price">{{ $product->price }}</p>
                        </div>

                        <div class="cart">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>

@include('partials.footer_js')
@endsection

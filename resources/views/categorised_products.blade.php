@extends('partials.base')

@section('content')
@include('partials.navbar')

<main class="Shop">
    <div class="hero">
        <h1>{{ $category->title }}</h1>
    </div>

    <div class="topnav">
        @include('partials.searchbar')
    </div>

    <div class="container">
         @include('partials.shop_sidenav')

        @include('partials.list_products')
    </div>
</main>

@include('partials.footer_js')
@endsection

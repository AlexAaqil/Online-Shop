@extends('partials.base')

@section('content')
@include('partials.navbar')

<main class="Shop">
    @if(!empty($category->title))
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
    @else
        <div class="slug_404">
            <img src="{{ asset('assets/images/slug_404.gif') }}" alt="Slug GIF">
            <h1>That category does not exist!</h1>
        </div>
    @endif

</main>

@include('partials.footer_js')
@endsection

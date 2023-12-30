@extends('partials.base')

@section('content')
<main class="Admin">
    @include('admin.aside')

    <section class="main_content Dashboard">
        <h1>Dashboard</h1>
        <p>Welcome Back {{ Auth::user()->first_name }}</p>
        <div class="statistics">
            <div class="statistic">
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="text">
                    <h1>Admins</h1>
                    <p>{{ $count_admins }}</p>
                </div>
            </div>

            <div class="statistic">
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="text">
                    <h1>Users</h1>
                    <p>{{ $count_users }}</p>
                </div>
            </div>

            <div class="statistic">
                <div class="icon">
                    <i class="fas fa-tags"></i>
                </div>
                <div class="text">
                    <h1>Categories</h1>
                    <p>{{ $count_categories }}</p>
                </div>
            </div>

            <div class="statistic">
                <div class="icon">
                    <i class="fas fa-sitemap"></i>
                </div>
                <div class="text">
                    <h1>Products</h1>
                    <p>{{ $count_products }}</p>
                </div>
            </div>

            <div class="statistic">
                <div class="icon">
                    <i class="fas fa-truck"></i>
                </div>
                <div class="text">
                    <h1>Orders</h1>
                    <p>40</p>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

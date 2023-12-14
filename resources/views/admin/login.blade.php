@extends('partials.base')

@section('content')
<section class="Admin">
    <div class="Login">
        <div class="container">
            <h1>Admin Login</h1>
            @include('partials.notifications')
            <form action="{{ url('/admin') }}" method="post">
                @csrf
                <input type="email" name="email" id="email" placeholder="Email Adress" autofocus />
                <input type="password" name="password" id="password" placeholder="Password" />
                <button type="submit">Login</button>
            </form>
            <p><a href="#">Forgort password</a></p>
        </div>
    </div>
</section>
@endsection

@extends('partials.base')

@section('content')
<section class="Admin">
    <div class="Login">
        <div class="container">
            <h1>Admin Login</h1>
            <form action="" method="post">
                <input type="email" name="email" id="email" placeholder="Email Adress" required autofocus />
                <input type="password" name="password" id="password" placeholder="Password" required />
                <button type="submit">Login</button>
            </form>
            <p><a href="#">Forgort password</a></p>
        </div>
    </div>
</section>
@endsection
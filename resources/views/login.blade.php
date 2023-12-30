@extends('partials.base')

@section('content')
<section class="Auth">
    <div class="container Login">
        <div class="customized_form">
            <h1>Login</h1>

            @include('partials.messages')
            <form action="" method="post">
                @csrf
                <div class="input_group">
                    <input type="email" name="email" id="email" placeholder="Email Adress" autofocus />
                </div>

                <div class="input_group">
                    <input type="password" name="password" id="password" placeholder="Password" />
                </div>

                <button type="submit">Login</button>
            </form>

            <p><a href="#">Forgort password</a></p>
            <p>Don't have an account? <a href="{{ url('/signup') }}">Signup</a></p>
        </div>
    </div>
</section>

@endsection

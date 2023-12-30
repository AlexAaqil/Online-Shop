@extends('partials.base')
@section('content')

<section class="Auth">
    <div class="container Signup">
        <div class="customized_form">
            <h1>Signup</h1>

            <form action="" method="post">
                @csrf

                <div class="row_input_group">
                    <div class="input_group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" placeholder="First Name" value="{{ old('first_name') }}" required />
                    </div>

                    <div class="input_group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required />
                    </div>
                </div>


                <div class="input_group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email Address" value="{{ old('email') }}" required />
                    <span class="inline_alert">{{ $errors->first('email') }}</span>
                </div>

                <div class="input_group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}" required />
                </div>

                <div class="input_group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" required />
                </div>

                <button type="submit">Signup</button>
            </form>

            <p>Already have an account? <a href="{{ url('/login') }}">Login</a></p>
        </div>
    </div>
</section>
@endsection

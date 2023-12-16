@extends('partials.base')

@section('content')
<main class="Admin">
    @include('admin.aside')

    <section class="main_content">
        <div class="customized_form">
            <div class="form_title">
                <h1>Update Admin</h1>
            </div>
            <div class="body">
                <form action="" method="post">
                    @csrf
                    <div class="input_group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $admin->first_name) }}" required />
                    </div>

                    <div class="input_group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $admin->last_name) }}" required />
                    </div>

                    <div class="input_group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $admin->email) }}" required />
                        <span class="inline_alert">{{ $errors->first('email') }}</span>
                    </div>

                    <div class="input_group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $admin->phone_number) }}" required />
                    </div>

                    <div class="input_group">
                        <label for="password">Password</label>
                        <input type="text" name="password" id="password" placeholder="Enter a new password or leave blank to use the same password" />
                    </div>

                    <div class="input_group">
                        <label for="status">Status</label>
                        <div class="custom_radio_buttons">
                            <label>
                                <input class="option_radio" type="radio" name="status" id="status" value="1" {{ ($admin->status == 1) ? 'checked' : '' }}>
                                <span>Active</span>
                            </label>

                            <label>
                                <input class="option_radio" type="radio" name="status" id="status" value="0" {{ ($admin->status == 0) ? 'checked' : '' }}>
                                <span>Inactive</span>
                            </label>
                        </div>
                    </div>

                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection

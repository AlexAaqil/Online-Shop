@extends('partials.base')

@section('content')
<main class="Admin">
    @include('admin.aside')

    <section class="main_content">
        <div class="container">
            <div class="customized_form">
                <h1>Update User</h1>

                <form action="" method="post">
                    @csrf
                    <div class="row_input_group">
                        <div class="input_group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $admin->first_name) }}" readonly />
                        </div>

                        <div class="input_group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $admin->last_name) }}" readonly />
                        </div>
                    </div>

                    <div class="row_input_group">
                        <div class="input_group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $admin->email) }}" readonly />
                        </div>

                        <div class="input_group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $admin->phone_number) }}" readonly />
                        </div>
                    </div>

                    <div class="row_input_group">
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

                        <div class="input_group">
                            <label for="status">User Level</label>
                            <div class="custom_radio_buttons">
                                <label>
                                    <input class="option_radio" type="radio" name="user_level" id="user_level" value="1" {{ ($admin->is_admin == 1) ? 'checked' : '' }}>
                                    <span>Admin</span>
                                </label>

                                <label>
                                    <input class="option_radio" type="radio" name="user_level" id="user_level" value="0" {{ ($admin->is_admin == 0) ? 'checked' : '' }}>
                                    <span>User</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection

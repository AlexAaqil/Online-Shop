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
                        <input type="text" name="first_name" id="first_name" value="{{ $admin->first_name }}" required />
                    </div>

                    <div class="input_group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" value="{{ $admin->last_name }}" required />
                    </div>

                    <div class="input_group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{ $admin->email }}" required />
                    </div>

                    <div class="input_group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" value="{{ $admin->phone_number }}" required />
                    </div>

                    <div class="input_group">
                        <label for="password">Password</label>
                        <input type="text" name="password" id="password" placeholder="Enter a new password or leave blank to use the same password" />
                    </div>

                    <div class="input_group">
                        <label for="is_admin">Is this an Admin?</label>
                        <div class="custom_radio_buttons">
                            <label>
                                <input class="option_radio" type="radio" name="is_admin" id="is_admin" value="1" {{ ($admin->is_admin == 1) ? 'checked' : '' }}>
                                <span>Yes</span>
                            </label>

                            <label>
                                <input class="option_radio" type="radio" name="is_admin" id="is_admin" value="0" {{ ($admin->is_admin == 0) ? 'checked' : '' }}>
                                <span class="span">No</span>
                            </label>
                        </div>
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

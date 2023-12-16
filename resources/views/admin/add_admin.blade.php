@extends('partials.base')

@section('content')
<main class="Admin">
    @include('admin.aside')

    <section class="main_content">
        <div class="customized_form">
            <div class="form_title">
                <h1>Add New Admin</h1>
            </div>
            <div class="body">
                <form action="" method="post">
                    @csrf
                    <div class="input_group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" required autofocus />
                    </div>

                    <div class="input_group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" required />
                    </div>

                    <div class="input_group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required />
                    </div>

                    <div class="input_group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" required />
                    </div>

                    <div class="input_group">
                        <label for="password">Password</label>
                        <input type="text" name="password" id="password" required />
                    </div>

                    <button type="submit">Save</button>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection

@extends('partials.base')

@section('content')
<main class="Admin">
    @include('admin.aside')

    <section class="main_content">
        <div class="header">
            <h1>Categories</h1>
            <input type="text" name="search" id="myInput" placeholder="Search" onkeyup="searchFunction()" />
            <div class="btn">
                <button><a href="{{ route('get_add_category') }}">Add New</a></button>
            </div>
        </div>

        <div class="body">
            @include('partials.messages')

            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
@endsection
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<script src="{{ asset('/assets/js/sweetalert.js') }}"></script>
<script src="{{ asset('/assets/js/my_js.js') }}"></script>

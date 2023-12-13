@extends('partials.base')

@section('content')
<main class="Admin">
    @include('admin.aside')
    <section class="main_content Categories">
        <h1>Categories</h1>
        <input type="text" name="search" id="search" placeholder="Search" />
        <div class="btn">
            <button>Add New</button>
        </div>
    </section>
</main>
@endsection
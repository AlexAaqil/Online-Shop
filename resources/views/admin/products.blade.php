@extends('partials.base')

@section('content')
<main class="Admin">
    @include('admin.aside')
    <section class="main_content Products">
        <h1>Products</h1>
        <input type="text" name="search" id="search" placeholder="Search" />
        <div class="btn">
            <button>Add New</button>
        </div>
    </section>
</main>
@endsection
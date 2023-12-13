@extends('partials.base')

@section('content')
<main class="Admin">
    @include('admin.aside')
    <section class="main_content Admin_Dashboard">
        <div class="dashboard_statistics">
            <div class="statistic">
                <h1>Categories</h1>
                <p>3</p>
            </div>
        </div>
    </section>
</main>
@endsection

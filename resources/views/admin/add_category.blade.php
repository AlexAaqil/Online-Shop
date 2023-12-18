@extends('partials.base')

@section('content')
<main class="Admin">
    @include('admin.aside')

    <section class="main_content">
        <div class="customized_form">
            <div class="form_title">
                <h1>Add New Category</h1>
            </div>
            <div class="body">
                <form action="" method="post">
                    @csrf
                    <div class="input_group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required />
                    </div>

                    <div class="input_group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" value="{{ old('description') }}"> </textarea>
                    </div>

                    <button type="submit">Save</button>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection

@extends('partials.base')

@section('content')
<main class="Admin">
    @include('admin.aside')

    <section class="main_content">
        <div class="customized_form">
            <div class="form_title">
                <h1>Update Category</h1>
            </div>
            <div class="body">
                <form action="" method="post">
                    @csrf
                    <div class="input_group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $category->title) }}" required />
                        <span class="inline_alert">{{ $errors->first('title') }}</span>
                    </div>

                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection

@extends('partials.base')

@section('content')
<main class="Admin">
    @include('admin.aside')

    <section class="main_content">
        <div class="customized_form">
            <div class="form_title">
                <h1>Update Sub Category</h1>
            </div>
            <div class="body">
                <form action="" method="post">
                    @csrf
                    <div class="input_group">
                        <label for="category_id">Category<span>*</span></label>
                        <select name="category_id" id="category_id" value="{{ old('category_id') }}">
                            <option value="">select</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $sub_category->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                        <span class="inline_alert">{{ $errors->first('category_id') }}</span>
                    </div>

                    <div class="input_group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $sub_category->title) }}" required />
                        <span class="inline_alert">{{ $errors->first('title') }}</span>
                    </div>

                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection

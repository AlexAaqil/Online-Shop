@extends('partials.base')

@section('content')
<main class="Admin">
    @include('admin.aside')

    <section class="main_content">
        <div class="customized_form">
            <div class="form_title">
                <h1>Add New Sub Category</h1>
            </div>
            <div class="body">
                <form action="" method="post">
                    @csrf
                    <div class="input_group">
                        <label for="category_id">Category<span>*</span></label>
                        <select name="category_id" id="category_id" value="{{ old('category_id') }}">
                            <option value="">select</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="input_group">
                        <label for="title">Sub category title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required />
                        <span class="inline_alert">{{ $errors->first('title') }}</span>
                    </div>

                    <button type="submit">Save</button>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection

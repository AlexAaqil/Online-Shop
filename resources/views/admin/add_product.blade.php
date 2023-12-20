@extends('partials.base')

@section('content')
<main class="Admin">
    @include('admin.aside')

    <section class="main_content">
        <div class="customized_form">
            <div class="form_title">
                <h1>Add New Product</h1>
            </div>
            <div class="body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input_group">
                        <label for="title">Title<span>*</span></label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Title" required autofocus />
                        <span class="inline_alert">{{ $errors->first('title') }}</span>
                    </div>

                    <div class="input_group_row">
                        <div class="input_group">
                            <label for="price">Price<span>*</span></label>
                            <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" placeholder="Enter the Price eg. 50.00" />
                        </div>

                        <div class="input_group">
                            <label for="new_price">New Price</label>
                            <input type="number" step="0.01" name="new_price" id="new_price" value="{{ old('new_price') }}" placeholder="Enter the New Price eg. 30.00 if there's a discount or offer" />
                        </div>
                    </div>

                    <div class="input_group_row">
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
                            <label for="brand_id">Brand<span>*</span></label>
                            <select name="brand_id" id="brand_id" value="{{ old('brand_id') }}">
                                <option value="">select</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="input_group">
                        <label for="size">Size</label>
                        <input type="text" name="size" id="size" value="{{ old('size') }}" placeholder="Enter the size" />
                    </div>

                    <div class="input_group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="7" value="{{ old('description') }}" placeholder="Enter a Description"></textarea>
                        <span class="inline_alert">{{ $errors->first('description') }}</span>
                    </div>

                    <div class="input_group">
                        <label for="images">Images (Maximum allowed images is 5)</label>
                        <input type="file" name="images[]" id="images" accept=".png, .jpg, .jpeg" multiple />
                    </div>

                    <button type="submit">Save</button>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection

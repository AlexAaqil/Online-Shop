@extends('partials.base')

@section('content')
<main class="Admin">
    @include('admin.aside')

    <section class="main_content">
        <div class="customized_form">
            <div class="form_title">
                <h1>Update Product</h1>
            </div>
            <div class="body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input_group">
                        <label for="title">Title<span>*</span></label>
                        <input type="text" name="title" id="title" value="{{ old('title', $product->title) }}" placeholder="Title" required />
                        <span class="inline_alert">{{ $errors->first('title') }}</span>
                    </div>

                    <div class="input_group_row">
                        <div class="input_group">
                            <label for="price">Price<span>*</span></label>
                            <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->price) }}" placeholder="Enter the Price eg. 50.00" />
                            <span class="inline_alert">{{ $errors->first('price') }}</span>
                        </div>

                        <div class="input_group">
                            <label for="new_price">New Price</label>
                            <input type="number" step="0.01" name="new_price" id="new_price" value="{{ old('new_price', $product->new_price) }}" placeholder="Enter the New Price eg. 30.00 if there's a discount or offer" />
                            <span class="inline_alert">{{ $errors->first('new_price') }}</span>
                        </div>
                    </div>

                    <div class="input_group_row">
                        <div class="input_group">
                            <label for="category_id">Category<span>*</span></label>
                            <select name="category_id" id="category_id" value="{{ old('category_id') }}">
                                <option value="">select</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="inline_alert">{{ $errors->first('category_id') }}</span>
                        </div>

                        <div class="input_group">
                            <label for="brand_id">Brand<span>*</span></label>
                            <select name="brand_id" id="brand_id" value="{{ old('brand_id') }}">
                                <option value="">select</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->title }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="inline_alert">{{ $errors->first('brand_id') }}</span>
                        </div>
                    </div>

                    <div class="input_group">
                        <label for="size">Size</label>
                        <input type="text" name="size" id="size" value="{{ old('size', $product->size) }}" placeholder="Enter the size" />
                        <span class="inline_alert">{{ $errors->first('size') }}</span>
                    </div>

                    <div class="input_group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="7">{{ $product->description }}</textarea>
                        <span class="inline_alert">{{ $errors->first('description') }}</span>
                    </div>

                    <div class="input_group">
                        <label for="images">Images (Maximum allowed images is 5)</label>
                        <input type="file" name="images[]" id="images" accept=".png, .jpg, .jpeg" multiple />
                        <span class="inline_alert">{{ session('error') ? session('error') : ($errors->has('images') ? $errors->first('images') : '') }}</span>
                    </div>

                    @if(!empty(session('success')))
                        <span class="inline_alert_success">{{ session('success') }}</span>
                    @endif

                    <div class="product_images">
                        @if(!empty($product_images->count()))
                            @foreach ($product_images as $image)
                                @if(!empty($image->getProductImageURL()))
                                    <div class="product_image">
                                        <img src="{{ $image->getProductImageURL() }}" alt="{{ $image->image_name }}" />
                                        <a href="javascript:void(0);" onclick="deleteItem({{ $image->id }}, 'image', '{{ url('/admin/products/delete_product_image/'.$image->id) }}');">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>

                    <button type="submit">Save</button>
                </form>
            </div>
        </div>
    </section>
</main>
@include('partials.footer_js')
@endsection

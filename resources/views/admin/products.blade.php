@extends('partials.base')

@section('content')
<main class="Admin">
    @include('admin.aside')

    <section class="main_content">
        <div class="header">
            <h1>Products</h1>
            <input type="text" name="search" id="myInput" placeholder="Search" onkeyup="searchFunction()" />
            <div class="btn">
                <button><a href="{{ route('get_add_product') }}">Add New</a></button>
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
                            <th>Price</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Created by</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->slug }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->category->title }}</td>
                                <td>{{ $product->brand->title }}</td>
                                <td>{{ $product->createdBy->first_name }} {{ $product->createdBy->last_name }}</td>
                                <td>
                                    <div class="actions">
                                        <div class="action">
                                            <a href="{{ url('/admin/products/update/'.$product->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                        </div>

                                        <div class="action">
                                            <form id="deleteForm_{{ $product->id }}" action="{{ route('delete_product', ['id' => $product->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <a href="javascript:void(0);" onclick="deleteItem({{ $product->id }}, 'product');">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
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

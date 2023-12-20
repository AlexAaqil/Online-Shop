@extends('partials.base')

@section('content')
<main class="Admin">
    @include('admin.aside')

    <section class="main_content">
        <div class="header">
            <h1>Categories</h1>
            <input type="text" name="search" id="myInput" placeholder="Search" onkeyup="searchFunction()" />
            <div class="btn">
                <button><a href="{{ route('get_add_category') }}">Add New</a></button>
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
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody class="searchable">
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <div class="actions">
                                    <div class="action">
                                        <a href="{{ url('/admin/categories/update/'.$category->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                    </div>

                                    <div class="action">
                                        <form id="deleteForm_{{ $category->id }}" action="{{ route('delete_category', ['id' => $category->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <a href="javascript:void(0);" onclick="deleteItem({{ $category->id }}, 'category');">
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
@include('partials.footer_js')
@endsection

@extends('partials.base')

@section('content')
<main class="Admin">
    @include('admin.aside')

    <section class="main_content">
        <div class="header">
            <h1> Sub Categories</h1>
            <input type="text" name="search" id="myInput" placeholder="Search" onkeyup="searchFunction()" />
            <div class="btn">
                <button><a href="{{ route('get_add_sub_category') }}">Add New</a></button>
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
                      @foreach($sub_categories as $sub_category)
                        <tr>
                            <td>{{ $sub_category->title }}</td>
                            <td>{{ $sub_category->slug }}</td>
                            <td>
                                <div class="actions">
                                    <div class="action">
                                        <a href="{{ url('/admin/subcategories/update/'.$sub_category->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                    </div>

                                    <div class="action">
                                        <form id="deleteForm_{{ $sub_category->id }}" action="{{ route('delete_sub_category', ['id'=> $sub_category->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <a href="javascript:void(0);" onclick="deleteItem({{ $sub_category->id }}, 'sub category');">
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

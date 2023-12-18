@extends('partials.base')

@section('content')
<main class="Admin">
    @include('admin.aside')

    <section class="main_content">
        <div class="header">
            <h1>Brands</h1>
            <input type="text" name="search" id="myInput" placeholder="Search" onkeyup="searchFunction()" />
            <div class="btn">
                <button><a href="{{ route('get_add_brand') }}">Add New</a></button>
            </div>
        </div>

        <div class="body">
            @include('partials.messages')

            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($brands as $brand)
                            <tr class="searchable">
                                <td>{{ $brand->title }}</td>
                                <td>
                                    <div class="actions">
                                        <div class="action">
                                            <a href="{{ url('/admin/brands/update/'.$brand->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                        </div>

                                        <div class="action">
                                            <form id="deleteForm_{{ $brand->id }}" action="{{ route('delete_brand', ['id' => $brand->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <a href="javascript:void(0);" onclick="deleteItem({{ $brand->id }}, 'brand');">
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

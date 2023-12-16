@extends('partials.base')

@section('content')
<main class="Admin">
    @include('admin.aside')

    <section class="main_content Categories">
        <div class="header">
            <h1>Admins</h1>
            <input type="text" name="search" id="myInput" placeholder="Search" onkeyup="searchFunction()" />
            <div class="btn">
                <button><a href="{{ route('add_admin_form') }}">Add New</a></button>
            </div>
        </div>

        <div class="body">
            @include('partials.messages')

            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Names</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($list_admins as $admin)
                        <tr class="searchable">
                            <td>{{ $admin->first_name }} {{ $admin->last_name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->status === 1 ? 'Active' : 'Not Active' }}</td>
                            <td>
                                <div class="actions">
                                    <div class="action">
                                        <a href="{{ url('/admin/update/'.$admin->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                    </div>

                                    <div class="action">
                                        <a href="{{ url('/admin/delete/'.$admin->id) }}"><i class="fas fa-trash-alt"></i></a>
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
<script src="{{ asset('/assets/js/search.js') }}"></script>

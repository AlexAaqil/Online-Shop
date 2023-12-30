@extends('partials.base')

@section('content')
<main class="Admin">
    @include('admin.aside')

    <section class="main_content">
        <div class="header">
            <h1>Users</h1>
            <input type="text" name="search" id="myInput" placeholder="Search" onkeyup="searchFunction()" />
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

                    <tbody class="searchable">
                        @foreach($list_users as $users)
                        <tr>
                            <td>{{ $users->first_name }} {{ $users->last_name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->status === 1 ? 'Active' : 'Not Active' }}</td>
                            <td>
                                <div class="actions">
                                    <div class="action">
                                        <a href="{{ url('admin/users/update/'.$users->id) }}"><i class="fas fa-pencil-alt"></i></a>
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

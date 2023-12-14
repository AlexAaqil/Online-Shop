@extends('partials.base')

@section('content')
<main class="Admin">
    @include('admin.aside')

    <section class="main_content Categories">
        <div class="header">
            <h1>Admins</h1>
            <input type="text" name="search" id="myInput" placeholder="Search" onkeyup="searchFunction()" />
            <div class="btn">
                <button>Add New</button>
            </div>
        </div>

        <div class="body">
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
                                        <i class="fas fa-pencil-alt"></i>
                                    </div>

                                    <div class="action">
                                        <i class="fas fa-trash-alt"></i>
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

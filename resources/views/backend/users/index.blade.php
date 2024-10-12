@extends('backend.layouts.app')
@section('title', 'Users')

@section('content')

    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">User Management</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                @if ($message = Session::get('success'))
                    <div class="col-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">User List</h3>
                                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Add User</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <!-- Search Form -->
                            <div class="d-flex justify-content-end align-items-center mb-2">
                                <form id="searchTableForm" action="{{ route('users.index') }}" method="GET">
                                    <div class="input-group" style="width: 300px;">
                                        <input type="text" name="search" class="form-control" id="userSearch" placeholder="Search Users" value="{{ request()->get('search') }}">
                                        <span class="input-group-text" onclick="submitSearch()">
                                            <i class="bi bi-search"></i>
                                        </span>
                                    </div>
                                </form>
                            </div>

                            <!-- User Table -->
                            <table class="table table-bordered" id="userTable">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th style="width: 100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $index => $user)
                                        <tr class="align-middle">
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone_number ?? 'not found' }}</td>
                                            <td>
                                                <div>
                                                    <a href="{{ route('users.edit', $user->id) }}" class="text-black"><i class="bi bi-pencil-square"></i></a>
                                                    <a href="#" class="text-danger" onclick="deleteUser('{{ $user->id }}')">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </a>

                                                    <!-- Form for user deletion -->
                                                    <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-none">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No users found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination Links -->
                        <div class="card-footer clearfix">
                            <div class="mt-2">
                                {{ $users->appends(['search' => request()->get('search')])->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <style>
        /* Add any custom styles here */
    </style>
@endpush

@push('scripts')
    <script>
        function submitSearch() {
            document.getElementById('searchTableForm').submit();
        }

        function deleteUser(id) {
            if (confirm('Are you sure you want to delete this user?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>

    <script type="module">
        $(document).ready(function() {
            console.log("ready!");
        });
    </script>
@endpush

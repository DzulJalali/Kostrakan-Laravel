@extends('layouts_admin.main')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <a href="{{ route('create') }}"><i class="fas fa-plus"></i> Add New</a>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>User ID</th>
                    <th>Nama</th>
                    <th>Nomor HP</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Foto Profile</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user as $user): ?>
                    <tr>
                    <td>{{ $user->user_id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->no_hp }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <img src="{{ asset('uploads/' . $user->profile_image) }}" width="200px" height="200px">
                    </td>
                        <td>
                            <a href="{{ route('edit', $user->user_id) }}" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                            <a href="{{ route('delete', $user->user_id) }}" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>         
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
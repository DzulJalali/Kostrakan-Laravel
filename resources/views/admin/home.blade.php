@extends('layouts_admin.main')

@section('content')

<div id="content">

    <div class="container-fluid">


        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            
        </div>


        <div class="row">

            <!-- Halaman Approve User -->
            
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead align="center">
                                </tr>
                            </thead>
                            <tbody align="center">
                            @if (session('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                <table class="table" style="padding-top:100px;" >
                                    <tr align="center">
                                        <th>Email</th>
                                        <th>Nama</th>
                                        <th>Nomor Ponsel</th>
                                        <th>Nomor Induk Kependudukan</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                    @forelse ($owner as $user) 

                                    <tr align="center">
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->no_hp }}</td>
                                        <td>{{ $user->nik }}</td>
                                        <td>{{ $user->alamat }}</td>
                                        <td>{{ $user->approved_status }}</td>
                                        @if($user->approved_status != 'approved')
                                        <td><a href="{{ route('approve', $user->owner_id) }}"
                                            class="btn btn-primary btn-sm">Approve</a></td>
                                        @else
                                        <td><a href="{{ route('removeApprove', $user->owner_id) }}"
                                            class="btn btn-danger btn-sm">Remove</a></td>
                                        @endif
                                    </tr>       
                                    @empty
                                    <tr>
                                        <td colspan="4">No users found.</td>
                                    </tr>
                                    
                                    @endforelse      
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>


@endsection

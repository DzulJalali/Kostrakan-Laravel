@extends('layouts_admin.main')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <a href="{{ route('user') }}"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
    <div class="card-body">

        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name"> Nama</label>
                <input class="form-control " type="text" name="name" id="name" placeholder="Nama" />
                <div class="invalid-feedback">
                </div>
            </div>
            <div class="form-group">
                <label for="no_hp"> Nomor HP</label>
                <input class="form-control " type="text" name="no_hp" id="no_hp" placeholder="Nomor HP" />
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group">
                <label for="email"> Email</label>
                <input class="form-control " type="text" name="email" id="email" placeholder="Email" />
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group">
                <label for="username"> Username*</label>
                <input class="form-control " type="text" name="username" id="username" placeholder="Username" />
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group">
                <label for="password"> Password</label>
                <input class="form-control " type="text" name="password" id="password" placeholder="Password" />
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group">
                <label for="role"> Role</label>
                <input class="form-control " type="number" name="role" id="role" min="0" max="1" placeholder="Role" />
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group">
                <label for="profile_image"> Foto Profile</label>
                <input class="form-control " type="file" name="profile_image" id="profile_image" placeholder="Foto Profile" />
                <div class="invalid-feedback">
                </div>
            </div>

            <input class="btn btn-success" type="submit" name="btn" value="Save" />
        </form>

    </div>

    <div class="card-footer small text-muted">
        * required fields
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <a href="{{ route('profilePage', $editProfile->user_id) }}"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
    <div class="card-body">

        <form action="{{ route('updateProfile', $editProfile->user_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name"> </label>
                <input type="hidden" class="form-control " name="id" id="id" value="{{ $editProfile->user_id }}" />
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group">
                <label for="name"> Nama</label>
                <input class="form-control " type="text" name="name" id="name" value="{{ $editProfile->name }}" />
                <div class="invalid-feedback">
                </div>
            </div>
            <div class="form-group">
                <label for="no_hp"> Nomor HP</label>
                <input class="form-control " type="text" name="no_hp" id="no_hp" value="{{ $editProfile->no_hp }}" />
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group">
                <label for="email"> Email</label>
                <input class="form-control " type="text" name="email" id="email" value="{{ $editProfile->email }}" />
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group">
                <label for="username"> Username*</label>
                <input class="form-control " type="text" name="username" id="username" value="{{ $editProfile->username }}"/>
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group">
                <label for="role"> Role</label>
                <input class="form-control " type="number" readonly="readonly" name="role" id="role" min="0" max="1" value="{{ $editProfile->role }}" />
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group">
                <label for="profile_image"> Foto Profile</label>
                <input class="form-control-file " type="file" name="profile_image" id="profile_image" />
                <img src="{{ asset('uploads/' . $editProfile->profile_image) }}" class="img-thumbnail" width="200px" />
                <input type="hidden" class="form-control-file" id="hidden_image" name="hidden_image" value="{{ $editProfile->profile_image }}">
            </div>

            <input class="btn btn-success" type="submit" name="btn" value="Save" />
        </form>

    </div>

    <div class="card-footer small text-muted">
        * required fields
    </div>


</div>
@endsection
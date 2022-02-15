@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ini Halaman Register Pemilik</h1>
    <h4>Ajukan Data Diri Anda</h4>
</div>

<div class="card mb-3">
    
    <div class="card-body">
        <form action="{{ route('registerPemilik') }}" method="POST">
        @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Lengkap Anda">
            </div>

            <div class="form-group">
                <label for="no_hp">Nomor HP</label>
                <input type="text" class="form-control" name="no_hp" placeholder="Masukan Nomor Ponsel Anda">
            </div>

            <div class="form-group">
                <label for="nik">Nomor Induk Kependudukan</label>
                <input type="text" class="form-control" name="nik" placeholder="Masukan NIK Anda">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat Anda">
            </div>
            <button type="submit" class="btn btn-primary">Ajukan</button>
        </form>
    </div>
</div>

@endsection
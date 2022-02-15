@extends('layouts_admin.main')

@section('title')
Tambah Kampus
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <a href="{{route('kampus')}}" class="d-flex align-items-baseline">
        <i class="fas fa-long-arrow-alt-left"></i>
        <p class="ml-1">Back</p>
    </a>

    <!-- Page Heading -->

    <!-- Content Row -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card shadow">
        <div class="card-body">
            <form action="{{route('tambahDataKampus')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="namaKampus">Nama Kampus</label>
                    <input type="text" class="form-control" name="namaKampus" placeholder="Masukan Nama Kampus">
                </div>
                <div class="form-group">
                    <label for="alamatKampus">Alamat Kampus</label>
                    <input type="text" class="form-control" name="alamatKampus" placeholder="Masukan Alamat kampus">
                </div>

                <div class="form-group">
                    <label for="namaKecamatan">Nama Kecamatan</label>
                    <input type="text" class="form-control" name="namaKecamatan" placeholder="Masukan Kecamatan">
                </div>
                <div class="form-group">
                    <label for="namaKota">Nama Kota</label>
                    <input type="text" class="form-control" name="namaKota" placeholder="Masukan Nama Kota">
                </div>
                <div class="form-group">
                    <label for="namaKelurahan">Nama Kelurahan</label>
                    <input type="text" class="form-control" name="namaKelurahan" placeholder="Masukan Kelurahan">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
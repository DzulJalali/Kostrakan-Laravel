@extends('layouts_admin.main')

@section('title')
Tambah Kecamatan
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <a href="{{route('kecamatan')}}" class="d-flex align-items-baseline">
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
            <form action="{{route('tambahDataKecamatan')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="kode_pos">Kode Pos</label>
                    <input type="text" class="form-control" name="kode_pos" placeholder="Masukan Kode Pos">
                </div>
                <div class="form-group">
                    <label for="namaKecamatan">Nama Kecamatan</label>
                    <input type="text" class="form-control" name="namaKecamatan" placeholder="Masukan Nama Kecamatan">
                </div>
                <div class="form-group">
                    <label for="namaKota">Nama Kota</label>
                    <input type="text" class="form-control" name="namaKota" placeholder="Masukan Nama Kota">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
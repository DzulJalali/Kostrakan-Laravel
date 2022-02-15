@extends('layouts_admin.main')

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
            <form action="/admin/kampus/update/{{$dataKampus['id_kampus']}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="namaKampus">Kode Pos</label>
                    <input type="text" class="form-control" name="namaKampus" placeholder="Masukan Nama Kampus"
                        value="{{ $dataKampus['namaKampus']}}">
                </div>
                <div class="form-group">
                    <label for="alamatKampus">Alamat Kampus</label>
                    <input type="text" class="form-control" name="alamatKampus" placeholder="Masukan Alamat Kampus"
                        value="{{ $dataKampus['alamatKampus']}}">
                </div>
                <div class="form-group">
                    <label for="namaKota">Nama Kota</label>
                    <input type="text" class="form-control" name="namaKota" placeholder="Masukan Nama Kota"
                        value="{{ $dataKampus['namaKota']}}">
                </div>

                <div class="form-group">
                    <label for="namaKecamatan">Nama Kecamatan</label>
                    <input type="text" class="form-control" name="namaKecamatan" placeholder="Masukan Nama Kecamatan"
                        value="{{ $dataKampus['namaKecamatan']}}">
                </div>

                <div class="form-group">
                    <label for="namaKelurahan">Nama Kelurahan</label>
                    <input type="text" class="form-control" name="namaKelurahan" placeholder="Masukan Nama Kelurahan"
                        value="{{ $dataKampus['namaKelurahan']}}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
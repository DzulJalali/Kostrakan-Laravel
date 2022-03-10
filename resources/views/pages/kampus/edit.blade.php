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
        @foreach($dataKampus as $dkp)
        <div class="card-body">
            <form action="/admin/kampus/update/{{$dkp['id_kampus']}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="namaKampus">Nama Kampus</label>
                    <input type="text" class="form-control" name="namaKampus" placeholder="Masukan Nama Kampus"
                        value="{{ $dkp['namaKampus']}}">
                </div>
                <div class="form-group">
                    <label for="alamatKampus">Alamat Kampus</label>
                    <input type="text" class="form-control" name="alamatKampus" placeholder="Masukan Alamat Kampus"
                        value="{{ $dkp['alamatKampus']}}">
                </div>
                <div class="form-group">
                    <label for="namaKota">Nama Kota</label>
                    <select name="id_kota" class="selectpicker show-tick form-control">
                        <option selected="selected">{{ $dkp['namaKota']}}</option>
                        @foreach ($dataDaerah as $dataDaerah)
                        <option value="{{ $dataDaerah['id_kota'] }}">{{ $dataDaerah['namaKota'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="namaKecamatan">Nama Kecamatan</label>
                    <select name="id_kecamatan" class="selectpicker show-tick form-control">
                        <option selected="selected">{{ $dkp['namaKecamatan']}}</option>
                        @foreach ($dataKecamatan as $dataKecamatan)
                        <option value="{{ $dataKecamatan['id_kecamatan'] }}">{{ $dataKecamatan['namaKecamatan'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="namaKelurahan">Nama Kelurahan</label>
                    <select name="id_kelurahan" class="selectpicker show-tick form-control">
                        <option selected="selected">{{ $dkp['namaKelurahan']}}</option>
                        @foreach ($dataKelurahan as $dataKelurahan)
                        <option value="{{ $dataKelurahan['id_kelurahan'] }}">{{ $dataKelurahan['namaKelurahan'] }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan
                </button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection
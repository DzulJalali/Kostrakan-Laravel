@extends('layouts_admin.main')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <a href="{{route('kelurahan')}}" class="d-flex align-items-baseline">
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
        @foreach ($dataKelurahan as $dk)
        <div class="card-body">
            <form action="/kelurahan/update/{{$dk['id_kelurahan']}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="namaKelurahan">Nama Kelurahan</label>
                    <input type="text" class="form-control" name="namaKelurahan" placeholder="Masukan Nama Kelurahan"
                        value="{{ $dk['namaKelurahan']}}">
                </div>
                <div class="form-group">
                    <label for="namaKecamatan">Nama Kecamatan</label>
                    <select name="id_kecamatan" class="selectpicker show-tick form-control">
                        <option selected="selected">{{ $dk['namaKecamatan']}}</option>
                        @foreach ($dataKecamatan as $dataKecamatan)
                        <option value="{{ $dataKecamatan['id_kecamatan'] }}">{{ $dataKecamatan['namaKecamatan'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="namaKota">Nama Kota</label>
                    <select name="id_kota" class="selectpicker show-tick form-control">
                        <option selected="selected">{{ $dk['namaKota']}}</option>
                        @foreach ($dataDaerah as $dataDaerah)
                        <option value="{{ $dataDaerah['id_kota'] }}">{{ $dataDaerah['namaKota'] }}</option>
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
@extends('layouts_admin.main')

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
        @foreach ($dataKecamatan as $dkm)
        <div class="card-body">
            <form action="/kecamatan/update/{{$dkm['id_kecamatan']}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="kode_pos">Kode Pos</label>
                    <input type="text" class="form-control" name="kode_pos" placeholder="Masukan Kode Pos"
                        value="{{ $dkm['kode_pos']}}">
                </div>
                <div class="form-group">
                    <label for="namaKecamatan">Nama Kecamatan</label>
                    <input type="text" class="form-control" name="namaKecamatan" placeholder="Masukan Nama Kecamatan"
                        value="{{ $dkm['namaKecamatan']}}">
                </div>
                <div class="form-group">
                    <label for="namaKota">Nama Kota</label>
                    <select name="id_kota" class="selectpicker show-tick form-control">
                        <option selected="selected">{{ $dkm['namaKota']}}</option>
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
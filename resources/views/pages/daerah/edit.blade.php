@extends('layouts_admin.main')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <a href="{{route('daerah')}}" class="d-flex align-items-baseline">
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
            <form action="/daerah/update/{{$dataDaerah['id_kota']}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="namaKota">Nama Kota</label>
                    <input type="text" class="form-control" name="namaKota" placeholder="Masukan Nama Kota"
                        value="{{ $dataDaerah['namaKota']}}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
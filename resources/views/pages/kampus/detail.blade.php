@extends('layouts_admin.main')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <a href="{{route('kampus')}}" class="d-flex align-items-baseline">
        <i class="fas fa-long-arrow-alt-left"></i>
        <p class="ml-1">Back</p>
    </a>
    
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th scope="col">Nama Kampus</th>
                    <th scope="col">Alamat Kampus</th>
                    <th scope="col">Nama Kota</th>
                    <th scope="col">Nama Kecamatan</th>
                    <th scope="col">Nama Kelurahan</th>
                </tr>
                <tr>
                @foreach ($dataKampus as $dataKampus)
                        
                <td data-label="Nama Kampus">{{ $dataKampus['namaKampus'] }}</td>
                <td data-label="Alamat Kampus">{{ $dataKampus['alamatKampus'] }}</td>
                <td data-label="Nama Kota">{{ $dataKampus['namaKota'] }}</td>
                <td data-label="Nama Kecamatan">{{ $dataKampus['namaKecamatan'] }}</td>
                <td data-label="Nama Kelurahan">{{ $dataKampus['namaKelurahan'] }}</td>
                @endforeach
                </tr>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
@extends('layouts_admin.main')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <a href="{{route('kecamatan')}}" class="d-flex align-items-baseline">
        <i class="fas fa-long-arrow-alt-left"></i>
        <p class="ml-1">Back</p>
    </a>
    
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th scope="col">Kode Pos</th>
                    <th scope="col">Nama Kecamatan</th>
                    <th scope="col">Nama Kota</th>
                </tr>
                <tr>
                @foreach ($dataDetail as $dataDetail)
        
                <td data-label="Kode Pos">{{$dataDetail['kode_pos']}}</td>
                <td data-label="Nama Kecamatan">{{$dataDetail['namaKecamatan']}}</td>
                <td data-label="Nama Kota">{{$dataDetail['namaKota']}}</td>
                @endforeach
                </tr>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
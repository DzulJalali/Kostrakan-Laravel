@extends('layouts_admin.main')

@section('title')
Kampus
@endsection

@section('content')
<div class="card background-table">
    <div class="d-flex justify-content-between">
        <a class="btn btn-primary mb-2 btn-responsive col-sm-12 col-md-6 col-lg-4 col-xl-2"
            href="{{route('tambahKampus')}}" role="button">Tambah Kampus</a>
        <form action="{{route('kampus')}}" method="GET" class="form-inline my-2 my-lg-0">
            <input type="search" name="cari" placeholder="Search" aria-label="Search" class="form-control mr-sm-2">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    <table class="table table-bordered mt-2">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kampus</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nama Kota</th>
                <th scope="col">Nama Kecamatan</th>
                <th scope="col">Nama Kelurahan</th>
                <th scope="col" class="text-center"><i class="fas fa-cog"></i></th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>

            @foreach($dataKampus as $dataKampus)
            <tr>
                <td data-label="No">{{$no++}}</td>
                <td data-label="Nama Kampus">{{$dataKampus['namaKampus']}}</td>
                <td data-label="Alamat Kampus">{{$dataKampus['alamatKampus']}}</td>
                <td data-label="Nama Kota">{{$dataKampus['namaKota']}}</td>
                <td data-label="Nama Kecamatan">{{$dataKampus['namaKecamatan']}}</td>
                <td data-label="Nama Kelurahan">{{$dataKampus['namaKelurahan']}}</td>
                <td data-label="Option">
                    <a href="/admin/kampus/detail/{{$dataKampus['id_kampus']}}" class="btn btn-primary">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="/admin/kampus/edit/{{$dataKampus['id_kampus']}}" class="btn btn-info">
                        <i class="fa fa-pencil-alt"></i>
                    </a>
                    <button type="button" class="btn btn-danger" data-toggle='modal'
                        data-target="#delete{{$dataKampus['id_kampus']}}">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal modal-danger fade" id="delete{{$dataKampus['id_kampus']}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modaL-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">Apakah Anda Yakin Hapus Data Ini?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="/admin/kampus/delete/{{$dataKampus['id_kampus']}}">Delete</a>
            </div>
        </div>
    </div>
</div>

@endsection
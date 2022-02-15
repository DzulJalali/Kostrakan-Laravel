@extends('layouts_admin.main')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <a href="{{ route('createBangunan') }}"><i class="fas fa-plus"></i> Add New</a>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>ID</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>Published Date</th>
                    <th>Status</th>
                    <th>Tipe Bangunan</th>
                    <th>Jumlah Ruangan</th>
                    <th>Luas Bangunan</th>
                    <th>Jumlah Lantai</th>
                    <th>Fasilitas</th>
                    <th>Harga</th>
                    <th>Gambar 1</th>
                    <th>Gambar 2</th>
                    <th>Gambar 3</th>
                    <th>Gambar 4</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bangunan as $bangunan): ?>
                    <tr>
                    <td>{{ $bangunan->building_id }}</td>
                    <td>{{ $bangunan->alamat }}</td>
                    <td>{{ $bangunan->nama_kk }}</td>
                    <td>{{ $bangunan->published_date }}</td>
                    <td>{{ $bangunan->status }}</td>
                    <td>{{ $bangunan->nama_tipe }}</td>
                    <td>{{ $bangunan->jmlh_ruangan }}</td>
                    <td>{{ $bangunan->luas_bangunan }}</td>
                    <td>{{ $bangunan->jmlh_lantai }}</td>
                    <td>{{ $bangunan->keterangan_fasilitas }}</td>
                    <td>{{ $bangunan->harga }}</td>
                    <td>
                        <img src="{{ asset('uploads/' . $bangunan->gambar1) }}" width="200px" height="200px">
                    </td>
                    <td>
                        <img src="{{ asset('uploads/' . $bangunan->gambar2) }}" width="200px" height="200px">
                    </td>
                    <td>
                        <img src="{{ asset('uploads/' . $bangunan->gambar3) }}" width="200px" height="200px">
                    </td>
                    <td>
                        <img src="{{ asset('uploads/' . $bangunan->gambar4) }}" width="200px" height="200px">
                    </td>
                        <td>
                            <a href="{{ route('editBangunan', $bangunan->building_id) }}" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                            <a href="{{ route('deleteBangunan', $bangunan->building_id) }}" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
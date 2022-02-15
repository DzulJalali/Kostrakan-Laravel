@extends('layouts_admin.main')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <a href="{{ route('tambahKK') }}"><i class="fas fa-plus"></i> Add New</a>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead align="center">
                    <th>No</th>
                    <th>Nama Kota/Kabupaten</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php $no = 1; ?>
                    @foreach ($cities as $cities)
                    <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $cities->nama_kk }}</td>
                        <td>
                            <a href="{{ route('editDataKK', $cities->kk_id) }}" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                            <a href="{{ route('deleteDataKK', $cities->kk_id) }}" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    @endforeach        
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
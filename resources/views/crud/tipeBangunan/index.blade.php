@extends('layouts_admin.main')

@section('content')
<div class="card mb-3">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead align="center">
                    <th>No</th>
                    <th>Tipe Bangunan</th>
                    </tr>
                </thead>
                <tbody align="center">
                <?php $no=1; ?>
                    @foreach ($tipeBangunan as $tipeBangunan)
                    <tr>
                    <td>{{$no++}}</td>
                    <td>{{ $tipeBangunan->nama_tipe }}</td>
                    @endforeach        
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
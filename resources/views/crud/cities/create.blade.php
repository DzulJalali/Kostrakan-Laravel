@extends('layouts_admin.main')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <a href="{{ route('cities') }}"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
    <div class="card-body">

        <form action="{{ route('tambahDataKK') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_kk"> Nama Kota/Kabupaten</label>
                <input class="form-control " type="text" name="nama_kk" id="nama_kk" placeholder="Nama Kota / Kabupaten" />
                <div class="invalid-feedback">
                </div>
            </div>

            <input class="btn btn-success" type="submit" name="btn" value="Save" />
        </form>

    </div>

    <div class="card-footer small text-muted">
        * required fields
    </div>
</div>
@endsection
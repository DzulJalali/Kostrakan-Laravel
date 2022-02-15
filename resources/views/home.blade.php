@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="{{asset('css/littlebar.css')}}">
<link rel="stylesheet" href="{{asset('css/styles.css')}}">


<!-- Pencari wilayah -->
<div class="container-fluid">
    <center>
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
            <h2>Cari Kontrakan dan kosan</h2>
            <p class="p"> Selamat Datang Di Kostrakan</p>
            <div class="search-form wow pulse px-3 d-flex justify-content-center" data-wow-delay="0.8s">
                <form action="{{ route('search') }}" method="GET" class=" form-inline">
                    <div class="form-group px-3">
                        <input type="text" name="search" class="form-control" placeholder="Keyword">
                    </div>
                </form>
                <form action="{{ route('advancesearch') }}" method="GET" class=" form-inline">
                    <div class="form-group px-3">
                        <select name="kk_id" class="selectpicker show-tick form-control">
                            <option selected="selected">-Kota/Daerah-</option>
                            @foreach ($cities as $cities)
                            <option value="{{ $cities->kk_id }}">{{ $cities->nama_kk }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group px-3">
                        <select name="tipe_id" class="selectpicker show-tick form-control">
                            <option selected="selected">-Kategori-</option>
                            @foreach ($tipeBangunan as $tipeBangunan)
                            <option value="{{ $tipeBangunan->tipe_id }}">{{ $tipeBangunan->nama_tipe }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button id="findBtn" class="btn search-btn" type="submit"><i class="fa fa-search"></i></button>
                </form>

            </div>
        </div>
    </center>
</div>
<!-- End Pencari wilayah -->

@auth
<div class="container">
    <center class="py-3">
        <h3>Rekomendasi</h3>
    </center>

        <div class="row">
            @include('recomendation', compact('contentsByContentBasedFiltering'))
        </div>
</div>
@endauth

<div class="container">
    <center class="py-3">
        <h3>Kontrakan Dan Kos-Kosan</h3>
    </center>
    <div class="row">
        @foreach($detailbangunan as $bangunan)
        <div class="card " style="width: 15rem;">
            <a href="/detail/{{ $bangunan->building_id }}" style="text-decoration: none;">
                <div class="inner">
                    <img class="card-img" src="{{ asset('uploads/' . $bangunan->gambar1) }}">
                </div>
                <div class="card-body">
                    <span class="e53_74">{{ $bangunan->harga }}</span><br>
                    <span class="e53_74">{{ $bangunan->nama_tipe }}</span><br>
                    <span class="e53_76">{{ $bangunan->alamat }}</span><br>
                    <span class="e53_77">{{ $bangunan->published_date }}</span><br>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

<center class="py-3">
    <h3>Kontrakan Dan Kos-Kosan Didekat Kampus</h3>
</center>

<div class="row">
    @foreach($dataKampus as $dataKampus)
    <div class="card " style="width: 15rem;">
        <a href="/detail-kampus/{{ $dataKampus['id_kampus'] }}" style="text-decoration: none;">
            <div class="card-body">
                <h5 class="card-title">{{ $dataKampus['namaKampus'] }}</h5>
                <p class="card-text">{{ $dataKampus['alamatKampus'] }}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Kota : {{ $dataKampus['namaKota'] }}</li>
                <li class="list-group-item">Kelurahan : {{ $dataKampus['namaKelurahan'] }}</li>
                <li class="list-group-item">Kecamatan : {{ $dataKampus['namaKecamatan'] }}</li>
            </ul>
        </a>
    </div>
    @endforeach
 </div>
 <br><br>


@endsection

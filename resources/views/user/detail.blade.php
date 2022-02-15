@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{asset('css/detail.css')}}">
<script src="{{asset('js/detail.js')}}"></script>

<!-- Profile -->
<div class="card">
    <img class="profile-picture" src="{{asset('/uploads')}}/{{$detail->profile_image}}" alt="profile" width="100" class="img-tumbnail rounded-circle">
    <h1 class="nama">{{ $detail->name }}</h1>
    <p class="title">{{ $detail->statusUser }}</p>
    <p><button class="btn btn-success">View Phone</button></p>
</div>
<!-- Container for the image gallery -->
<div class="container-gambar">
    <div class="mySlides">
        <div class="numbertext">1 / 4</div>
        <img class="img" src="{{asset('/uploads')}}/{{$detail->gambar1}}" style="width:100%">
    </div>

    <div class="mySlides">
        <div class="numbertext">2 / 4</div>
        <img class="img" src="{{asset('/uploads')}}/{{$detail->gambar2}}" style="width:100%">
    </div>

    <div class="mySlides">
        <div class="numbertext">3 / 4</div>
        <img class="img" src="{{asset('/uploads')}}/{{$detail->gambar3}}" style="width:100%">
    </div>

    <div class="mySlides">
        <div class="numbertext">4 / 4</div>
        <img class="img" src="{{asset('/uploads')}}/{{$detail->gambar4}}" style="width:100%">
    </div>

        <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <!-- Image text -->
    <div class="caption-container">
        <p id="caption"></p>
    </div>

</div>
<!-- Full-width images with number text -->



<!-- Thumbnail images -->
<div class="row my-3">
    <div class="column mx-3">
        <img class="demo cursor" src="{{asset('/uploads')}}/{{$detail->gambar1}}" style="width:100%"
            onclick="currentSlide(1)" alt="Gambar 1">
    </div>
    <div class="column mx-3">
        <img class="demo cursor" src="{{asset('/uploads')}}/{{$detail->gambar2}}" style="width:100%"
            onclick="currentSlide(2)" alt="Gambar 2">
    </div>
    <div class="column mx-3">
        <img class="demo cursor" src="{{asset('/uploads')}}/{{$detail->gambar3}}" style="width:100%"
            onclick="currentSlide(3)" alt="Gambar 3">
    </div>
    <div class="column mx-3">
        <img class="demo cursor" src="{{asset('/uploads')}}/{{$detail->gambar4}}" style="width:100%"
            onclick="currentSlide(4)" alt="Gambar 4">
    </div>
</div>


<!--GENERAL INFORMATION-->

<div class="general-information">
    <span class="info">General Information</span>
    <div class="row">
        <table class="table table-borderless" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <th scope="row">Alamat</th>
                    <td class="alamat">{{ $detail->alamat }}</td>
                    <th scope="row">Jumlah Lantai</th>
                    <td>{{ $detail->jmlh_lantai }}</td>
                </tr>
                <tr>
                    <th scope="row">Kota / Daerah</th>
                    <td>{{ $detail->nama_kk }}</td>
                    <th scope="row">Fasilitas</th>
                    <td>{{ $detail->keterangan_fasilitas }}</td>
                </tr>
                <tr>
                    <th scope="row">Published Date</th>
                    <td>{{ $detail->published_date }}</td>
                    <th scope="row">Harga</th>
                    <td>{{ $detail->harga }}</td>
                </tr>
                <tr>
                    <th scope="row">Status</th>
                    <td>{{ $detail->status }}</td>
                    <th scope="row">Dekat Kampus</th>
                    @if($detail->namaKampus == null)
                    <td>Tidak Tersedia</td>
                    @else
                    <td>{{ $detail->namaKampus }}</td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">Tipe Bangunan</th>
                    <td>{{ $detail->nama_tipe }}</td>
                </tr>
                <tr>
                    <th scope="row">Jumlah Ruangan</th>
                    <td>{{ $detail->jmlh_ruangan }}</td>
                </tr>
                <tr>
                    <th scope="row">Luas Ruangan</th>
                    <td>{{ $detail->luas_bangunan }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

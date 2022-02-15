@extends('layouts.main')
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
@section('content')
<div class="container">
    <h3>Hasil Pencarian</h3>
    <div id="buildingData" class="row">
        @foreach($bangunan as $building)
        <div class="card " style="width: 15rem;">
            <a href="/detail/{{ $building->building_id }}" style="text-decoration: none;">
                <div class="inner">
                    <img class="card-img" src="{{ asset('uploads/' . $building->gambar1) }}">
                </div>
                <div class="card-body">
                    <span class="e53_74">{{ $building->harga }}</span><br>
                    <span class="e53_74">{{ $building->nama_tipe }}</span><br>
                    <span class="e53_76">{{ $building->alamat }}</span><br>
                    <span class="e53_77">{{ $building->published_date }}</span><br>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
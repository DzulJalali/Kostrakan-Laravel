@extends('layouts.main')
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
@section('content')
    @foreach ($dataKampus as $dak)
        @foreach ($detailKampus as $dk)
            @if($dk->namaKampus == $dak['namaKampus'] )
                <div class="container">
                    <div class="row">
                            <div class="card " style="width: 15rem;">
                                <a href="/detail/{{ $dk->building_id }}" style="text-decoration: none;">
                                    <div class="inner">
                                        <img class="card-img" src="{{ asset('uploads/' . $dk->gambar1) }}">
                                    </div>
                                    <div class="card-body">
                                        <span class="e53_74">{{ $dk->harga }}</span><br>
                                        <span class="e53_74">{{ $dk->nama_tipe }}</span><br>
                                        <span class="e53_76">{{ $dk->alamat }}</span><br>
                                        <span class="e53_77">{{ $dk->published_date }}</span><br>
                                    </div>
                                </a>
                            </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endforeach
@endsection

@extends('layouts_user.main')

@section('content')
<style>
    .konten
    {
        display: flex;
        justify-content: center;
        align-items: center;
        
    }
    button
    {
        margin-left: 15px;
        margin-top: 10px;
    }  
</style>
<div class="konten">
{{-- <div class="search-form wow pulse px-3 d-flex justify-content-center" data-wow-delay="0.8s"> --}}
    <form action="{{ route('rekomendasi') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <p class="paragraf">Pilih Tipe Bangunan Yang ingin Dicari:</p>
            <div class="form-group px-3">
                <select name="tipe_id" class="selectpicker show-tick form-control">
                    <option selected="selected">-Tipe-</option>
                    @foreach ($tipeBangunan as $tipeBangunan)
                    <option value="{{ $tipeBangunan->tipe_id }}">{{ $tipeBangunan->nama_tipe }}</option>
                    @endforeach
                </select>
            </div>
            
        <p class="paragraf">Pilih Kota Mana yang Ingin Dicari</p>
            <div class="form-group px-3">
                <select name="kk_id" class="selectpicker show-tick form-control">
                    <option selected="selected">-Kota/Daerah-</option>
                    @foreach ($cities as $cities)
                    <option value="{{ $cities->kk_id }}"> {{ $cities->nama_kk   }}</option>
                    @endforeach
                </select>
            </div>  
        <p class="paragraf">Pilih Jumlah Ruangan</p>
            <div class="form-group px-3">
                <select name="jmlh_ruangan" class="selectpicker show-tick form-control">
                    <option selected="selected">-Jumlah Ruangan-</option>
                    @foreach ($ruangan as $ruangan)
                    <option> {{ $ruangan->jmlh_ruangan   }}</option>
                    @endforeach
                </select>
            </div> 
        
        <p class="paragraf">Pilih Jumlah Lantai</p>
            <div class="form-group px-3">
                <select name="jmlh_lantai" class="selectpicker show-tick form-control">
                    <option selected="selected">-Jumlah Lantai-</option>
                    @foreach ($lantai as $lantai)
                    <option> {{ $lantai->jmlh_lantai   }}</option>
                    @endforeach
                </select>
            </div>
    
        <p class="paragraf">Pilih Fasilitas</p>
            <div class="form-group">
                <div class="form-group px-3">
                    <select name="keterangan_fasilitas" class="selectpicker show-tick form-control">
                        <option selected="selected">-Fasilitas-</option>
                        @foreach ($fasilitas as $fasilitas)
                        <option> {{ $fasilitas->keterangan_fasilitas }}</option>
                        @endforeach
                    </select>
                </div>   
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            {{-- </div> --}}
    </div>


    {{-- <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Submit</button> --}}
</form>
</div>
<script src="{{ asset('js/price-range.js') }}"></script>

@endsection

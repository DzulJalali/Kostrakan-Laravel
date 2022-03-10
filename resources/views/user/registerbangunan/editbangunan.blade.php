@extends('layouts.app')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <a href="{{ route('registerBangunan') }}"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
    <div class="card-body">

        <form action="{{ route('updateBangunanByOwner', $editBangunan->building_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="building_id"></label>
                <input type="hidden" class="form-control " name="building_id" id="building_id" value="{{ $editBangunan->building_id }}" />
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group">
                <label for="alamat"> Alamat</label>
                <input class="form-control " type="text" name="alamat" id="alamat" value="{{ $editBangunan->alamat }}" />
                <div class="invalid-feedback">
                </div>
            </div>
            <div class="form-group">
                <label for="kk_id">Pilih Kota :</label>
                    <select name="kk_id" class="selectpicker show-tick form-control">
                        <option selected="selected">-Pilih Kota-</option>
                        @foreach ($cities as $cities)
                        <option value="{{ $cities->kk_id }}">{{ $cities->nama_kk }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                    </div>
            </div>

            <div class="form-group">
                <label for="published_date"> Published Date</label>
                <input class="form-control " type="date" name="published_date" id="published_date" value="{{ $editBangunan->published_date }}" />
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group">
                <label for="status"> Status</label>
                <input class="form-control " type="text" name="status" id="status" value="{{ $editBangunan->status }}" />
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group">
                <label for="tipe_id">Pilih Tipe Bangunan :</label>
                    <select name="tipe_id" class="selectpicker show-tick form-control">
                        <option selected="selected">-Tipe Bangunan-</option>
                        @foreach ($tipeBangunan as $tipeBangunan)
                        <option value="{{ $tipeBangunan->tipe_id }}"> {{ $tipeBangunan->nama_tipe   }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                    </div>
            </div>

            <div class="form-group">
                <label for="jmlh_ruangan"> Jumlah Ruangan</label>
                <input class="form-control " type="text" name="jmlh_ruangan" id="jmlh_ruangan" value="{{ $editBangunan->jmlh_ruangan }}" />
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group">
                <label for="luas_bangunan"> Luas Bangunan</label>
                <input class="form-control " type="text" name="luas_bangunan" id="luas_bangunan" value="{{ $editBangunan->luas_bangunan }}" />
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group">
                <label for="jmlh_lantai"> Jumlah Lantai</label>
                <input class="form-control " type="text" name="jmlh_lantai" id="jmlh_lantai" value="{{ $editBangunan->jmlh_lantai }}" />
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group">
                <label for="keterangan_fasilitas"> Fasilitas</label>
                <input class="form-control " type="text" name="keterangan_fasilitas" id="keterangan_fasilitas" value="{{ $editBangunan->keterangan_fasilitas }}" />
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group">
                <label for="harga"> Harga</label>
                <input class="form-control " type="text" name="harga" id="harga" value="{{ $editBangunan->harga }}" />
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group">
                <label for="namaKampus">Pilih Kampus yang dekat dengan Kos/Kontrakan :</label>
                    <select name="namaKampus" class="selectpicker show-tick form-control">
                        <option selected="selected">{{ $editBangunan->namaKampus}}</option>
                        @foreach ($kampus as $kampus)
                        <option value="{{ $kampus['namaKampus'] }}">{{ $kampus['namaKampus'] }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                    </div>
                <small id="keterangan" class="form-text text-muted">Untuk Pemilihan lokasi dekat kampus OPSIONAL</small>
            </div>

            <div class="form-group">
                <label for="gambar1"> Gambar 1</label>
                <input class="form-control-file " type="file" name="gambar1" id="gambar1" />
                <img src="{{ asset('uploads/' . $editBangunan->gambar1) }}" class="img-thumbnail" width="200px" />
                <input type="hidden" class="form-control-file" id="hidden_image" name="hidden_image" value="{{ $editBangunan->gambar1 }}">
            </div>

            <div class="form-group">
                <label for="gambar2"> Gambar 2</label>
                <input class="form-control-file " type="file" name="gambar2" id="gambar2" />
                <img src="{{ asset('uploads/' . $editBangunan->gambar2) }}" class="img-thumbnail" width="200px" />
                <input type="hidden" class="form-control-file" id="hidden_image" name="hidden_image" value="{{ $editBangunan->gambar2 }}">
            </div>

            <div class="form-group">
                <label for="gambar3"> Gambar 3</label>
                <input class="form-control-file " type="file" name="gambar3" id="gambar3" />
                <img src="{{ asset('uploads/' . $editBangunan->gambar3) }}" class="img-thumbnail" width="200px" />
                <input type="hidden" class="form-control-file" id="hidden_image" name="hidden_image" value="{{ $editBangunan->gambar3 }}">
            </div>

            <div class="form-group">
                <label for="gambar4"> Gambar 4</label>
                <input class="form-control-file " type="file" name="gambar4" id="gambar1" />
                <img src="{{ asset('uploads/' . $editBangunan->gambar4) }}" class="img-thumbnail" width="200px" />
                <input type="hidden" class="form-control-file" id="hidden_image" name="hidden_image" value="{{ $editBangunan->gambar4 }}">
            </div>

            <input class="btn btn-success" type="submit" name="btn" value="Save" />
        </form>

    </div>

    <div class="card-footer small text-muted">
        * required fields
    </div>
</div>
@endsection
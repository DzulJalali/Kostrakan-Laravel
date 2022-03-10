<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Models\Daerah;

class KelurahanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->kelurahan = new Kelurahan();
        $this->kecamatan = new Kecamatan();
        $this->daerah = new Daerah();
    }

    public function index(request $request)
    {
        if($request->has('cari'))
        {
            if($request->cari == null){
                $data = [
                    'dataKelurahan'=>$this->kelurahan->all_data(),
                ];
                return view('pages.kelurahan.index',$data);
            }else{
                $keyword = $request->cari;
                $data=[
                    'dataKelurahan'=>$this->kelurahan->searchData($keyword),
                ];
                return view('pages.kelurahan.index',$data);
            }
        }
        else
        {
            $data = [
                'dataKelurahan'=>$this->kelurahan->all_data(),
            ];
            return view('pages.kelurahan.index',$data);
        }
    }

    public function tampilTambah()
    {
        $data = [
        'dataKecamatan'=>$this->kecamatan->all_data(),
        'dataKelurahan'=>$this->kelurahan->all_data(),
        'dataDaerah'=>$this->daerah->all_data(),
    ];
        return view('pages.kelurahan.tambah', $data);
    }

    public function submitTambahData(Request $request)
    {
        $response = [
            'namaKelurahan' => $request->namaKelurahan,
            'id_kecamatan' => $request->id_kecamatan,
            'id_kota' => $request->id_kota,
        ];
        $this->kelurahan->tambahData($response);
        return redirect()->route('kelurahan')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        $data = [
            'dataKelurahan'=>$this->kelurahan->data_id($id),
            'dataKecamatan'=>$this->kecamatan->all_data(),
            'dataDaerah'=>$this->daerah->all_data(),
        ];
        // dd($data);
        return view('pages.kelurahan.edit',$data);
    }

    public function submitDataEdit(Request $request, $id)
    {
        $response=[
            'namaKelurahan' => $request->namaKelurahan,
            'id_kecamatan' => $request->id_kecamatan,
            'id_kota' => $request->id_kota,
        ];
        $this->kelurahan->editData($id,$response);
        return redirect()->route('kelurahan')->with('success', 'Data Berhasil Di Update');
    }

    public function deleteData($id)
    {
        $this->kelurahan->deleteData($id);
        return redirect()->route('kelurahan')->with('success', 'Data Berhasil Di Hapus');
    }
    public function detail($id)
    {
        $data = [
            'dataDetail'=>$this->kelurahan->data_id($id),
        ];
        return view('pages.kelurahan.detail',$data);
    }
}

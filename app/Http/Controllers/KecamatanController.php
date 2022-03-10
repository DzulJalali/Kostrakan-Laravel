<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Daerah;



class KecamatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->kecamatan = new Kecamatan();
        $this->kelurahan = new Kelurahan();
        $this->daerah = new Daerah();
    }

    public function index(request $request)
    {
        if($request->has('cari'))
        {
            if($request->cari == null){
                $data = [
                    'dataKecamatan'=>$this->kecamatan->all_data(),
                ];
                return view('pages.kecamatan.index',$data);
            }else{
                $keyword = $request->cari;
                $data=[
                    'dataKecamatan'=>$this->kecamatan->searchData($keyword),
                ];
                return view('pages.kecamatan.index',$data);
            }
        }
        else
        {
            $data = [
                'dataKecamatan'=>$this->kecamatan->all_data(),
            ];
            return view('pages.kecamatan.index',$data);
        }
    }

    public function tampilTambah()
    {
        $data = [
            'dataKecamatan'=>$this->kecamatan->all_data(),
            'dataKelurahan'=>$this->kelurahan->all_data(),
            'dataDaerah'=>$this->daerah->all_data(),
        ];
        return view('pages.kecamatan.tambah', $data);
    }

    public function submitTambahData(Request $request)
    {
        $response = [
            'kode_pos' => $request->kode_pos,
            'namaKecamatan' => $request->namaKecamatan,
            'id_kota' => $request->id_kota,
        ];
        $this->kecamatan->tambahData($response);
        return redirect()->route('kecamatan')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        $data = [
            'dataKecamatan'=>$this->kecamatan->data_id($id),
            'dataDaerah'=>$this->daerah->all_data(),
        ];
        return view('pages.kecamatan.edit',$data);
    }

    public function submitDataEdit(Request $request, $id)
    {
        $response=[
            'kode_pos' => $request->kode_pos,
            'namaKecamatan' => $request->namaKecamatan,
            'id_kota' => $request->id_kota,
        ];
        $this->kecamatan->editData($id,$response);
        return redirect()->route('kecamatan')->with('success', 'Data Berhasil Di Update');
    }

    public function deleteData($id)
    {
        $this->kecamatan->deleteData($id);
        return redirect()->route('kecamatan')->with('success', 'Data Berhasil Di Hapus');
    }
    public function detail($id)
    {
        $data = [
            'dataDetail'=>$this->kecamatan->data_id($id),
        ];
        return view('pages.kecamatan.detail',$data);
    }

}

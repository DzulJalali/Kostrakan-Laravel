<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Daerah;
use App\Models\Kecamatan;
use App\Models\Kelurahan;

class DaerahController extends Controller
{
    public function __construct()
    {
        $this->daerah = new Daerah();
        $this->kecamatan = new Kecamatan();
        $this->kelurahan = new Kelurahan();
    }

    public function index(request $request)
    {
        if($request->has('cari')){
            if($request->cari == null){
                    $data = [
                        'dataDaerah'=>$this->daerah->all_data(),
                    ];
                    return view('pages.daerah.index',$data);
            }else{
                $keyword = $request->cari;
                $data=[
                    'dataDaerah'=>$this->daerah->searchData($keyword),
                ];
                return view('pages.daerah.index',$data);
            }
        }else{
            $data = [
                'dataDaerah'=>$this->daerah->all_data(),
            ];
            return view('pages.daerah.index',$data);
        }
    }

    public function tampilTambah()
    {
        
        $data = [
            'dataKecamatan'=>$this->kecamatan->all_data(),
            'dataKelurahan'=>$this->kelurahan->all_data(),
        ];
    return view('pages.daerah.tambah',$data);
    }

    public function submitTambahData(Request $request)
    {
        $request=[
            'nama_daerah' => $request->nama_daerah,
            'id_kecamatan' => $request->nama_kecamatan,
            'id_kelurahan' => $request->nama_kelurahan,
            'nearBy' => $request->nearBy,
            ];
            $this->daerah->tambahData($request);
        return redirect()->route('daerah')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        $data = [
            'dataDaerah'=>$this->daerah->data_id($id),
            'dataKecamatan'=>$this->kecamatan->all_data(),
            'dataKelurahan'=>$this->kelurahan->all_data(),
        ];
        return view('pages.daerah.edit',$data);
    }

    public function submitDataEdit(Request $request,$id)
    {
        $response = [
            'nama_daerah' => $request->nama_daerah,
            'id_kecamatan' => $request->nama_kecamatan,
            'id_kelurahan' => $request->nama_kelurahan,
            'nearBy' => $request->nearBy,
        ];
         $this->daerah->editData($id,$response);
         return redirect()->route('daerah')->with('success', 'Data Berhasil Di Tambahkan');
     }

     public function deleteData($id){
        $this->daerah->deleteData($id);
        return redirect()->route('daerah')->with('success', 'Data Berhasil Di Hapus');
    }

    public function detail($id){
        $data = [
            'dataDetail'=>$this->daerah->data_id($id),
        ];
        return view('pages.daerah.detail',$data);
    }
}

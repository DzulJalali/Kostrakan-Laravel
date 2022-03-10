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
        return view('pages.daerah.tambah');
    }

    public function submitTambahData(Request $request)
    {
        $response = [
            'namaKota' => $request->namaKota,
        ];
        $this->daerah->tambahData($response);
        return redirect()->route('daerah')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZF91c2VyIjoiMiIsInVzZXJuYW1lIjoiZmFpc2FsIn0.AHQOMcj5ZPdE1Q5r9jRsOy1hqAqFHdwHNsROHZUaznM',
        ])->get('http://localhost:8080/api/kota/'.$id, [
            'key' => '123',
        ]);
        $data = [
            'dataDaerah'=>$this->daerah->data_id($id),
        ];
        return view('pages.daerah.edit',$data);
    }

    public function submitDataEdit(Request $request,$id)
    {
        $response=[
            'namaKota' => $request->namaKota,
        ];
        $this->daerah->editData($id,$response);
        return redirect()->route('daerah')->with('success', 'Data Berhasil Di Update');
        // dd($id);
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
        // dd($data);
    }
}

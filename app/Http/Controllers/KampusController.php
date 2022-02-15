<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Kampus;

class KampusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->kampus = new Kampus();
    }

    public function index(request $request)
    {
        if($request->has('cari'))
        {
            if($request->cari == null){
                $data = [
                    'dataKampus'=>$this->kampus->all_data(),
                ];
                return view('pages.kampus.index',$data);
            }else{
                $keyword = $request->cari;
                $data=[
                    'dataKampus'=>$this->kampus->searchData($keyword),
                ];
                return view('pages.kampus.index',$data);
            }
        }
        else
        {
            $data = [
                'dataKampus'=>$this->kampus->all_data(),
            ];
            return view('pages.kampus.index',$data);
        }
    }

    public function display()
    {
        $data = [
            'dataKampus'=>$this->kampus->all_data(),
        ];

        return view('apikampus', $data);
    }

    public function tampilTambah()
    {
        return view('pages.kampus.tambah');
    }

    public function submitTambahData(Request $request)
    {
        $response = [
            'namaKampus' => $request->namaKampus,
            'alamatKampus' => $request->alamatKampus,
            'id_kota' => $request->id_kota,
            'id_kecamatan' => $request->id_kecamatan,
            'id_kelurahan' => $request->id_kelurahan,
        ];
        $this->kampus->tambahData($response);
        return redirect()->route('kampus')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        $data = [
            'dataKampus'=>$this->kampus->data_id($id),
        ];
        return view('pages.kampus.edit',$data);
    }

    public function submitDataEdit(Request $request, $id)
    {
        $response=[
            'namaKampus' => $request->namaKampus,
            'alamatKampus' => $request->alamatKampus,
            'id_kota' => $request->id_kota,
            'id_kecamatan' => $request->id_kecamatan,
            'id_kelurahan' => $request->id_kelurahan,
        ];
        $this->kampus->editData($id,$response);
        return redirect()->route('kampus')->with('success', 'Data Berhasil Di Update');
    }

    public function deleteData($id)
    {
        $this->kampus->deleteData($id);
        return redirect()->route('kampus')->with('success', 'Data Berhasil Di Hapus');
    }
    public function detail($id)
    {
        $data = [
            'dataKampus'=>$this->kampus->data_id($id),
        ];
        // dd($data);
        return view('pages.kampus.detail',$data);
    }

    //Mengambil data bangunan sesuai API kampus
    public function fetchDataBangunan()
    {
        
    }
}

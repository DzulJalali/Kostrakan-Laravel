<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuildingDetails;
use App\Models\BuildingTypes;
use App\Models\Cities;
use App\Models\ContentBasedFilter;
use Illuminate\Support\Facades\DB;
use Auth;

class CBFController extends Controller
{
    public function __construct()
    {
        $this->bangunan = new BuildingDetails();
        $this->tipe = new BuildingTypes();
        $this->contentfilter = new ContentBasedFilter();
        $this->kotakabupaten = new Cities();

    }

    public function needs()
    {
        $data=[
            'tipeBangunan' => $this->tipe->getAll(),
            'cities' => $this->kotakabupaten->getAll(),
            'ruangan' => $this->bangunan->getRuangan(),
            'lantai' => $this->bangunan->getLantai(),
            'fasilitas' => $this->bangunan->getAllDistinct(),
        ];
        return view('user_needs', $data);
    }

    public function storeNeeds(Request $request)
    {
        $data=
        [
            'user_id' => Auth::user()->user_id,
            'tipe_id' => $request->get('tipe_id'),
            'kk_id' => $request->get('kk_id'),
            'jmlh_ruangan' => $request->jmlh_ruangan,
            'jmlh_lantai' => $request->jmlh_lantai,
            'keterangan_fasilitas' => $request->keterangan_fasilitas,
        ];
        //dd($data);
        $this->contentfilter->storeContentFiltering($data);
        return redirect()->route('home');
    }

    //Content Based Filtering
    public function getRecomendation(Request $request)
    {
        $rekomen = $request->only('nama_tipe');
        $rekomen2 = $request->only('nama_kk');
        $rekomen3 = $request->only('harga');
        $rekomen4 = $request->only('keterangan_fasilitas');
        $data = 
        [
            'tipeBangunan' => $this->tipe->getAll(),
            'cities' => $this->kotakabupaten->getAll(),
            'detailbangunan' => $this->bangunan->getAll(),
            
            DB::table('building_details')
            ->leftjoin('building_types as bt', 'bt.tipe_id', '=', 'building_details.tipe_id')
            ->leftjoin('cities as ct', 'ct.kk_id', '=', 'building_details.kk_id')
            ->where('nama_tipe', '=', $rekomen)
            ->where('nama_kk', '=', $rekomen2)
            ->where('harga', '=', $rekomen3)
            ->where('keterangan_fasilitas', '=', $rekomen4)->get()
        ];

        // dd($data);
        //return view('home', $data);
    }
    
}

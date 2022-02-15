<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Daerah;
use App\Models\BuildingTypes;
use App\Models\BuildingDetails;
use App\Models\Cities;
use App\Models\User;
use App\Models\Kampus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->bangunan = new Home();
        $this->daerah = new Daerah();
        $this->tipe = new BuildingTypes();
        $this->kotakabupaten = new Cities();
        $this->user = new User();
        $this->kampus = new Kampus();
        $this->buildingdetails = new BuildingDetails();

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check())
        {
            $contentsByContentBasedFiltering = BuildingDetails::filteredByUser();
            // $building = BuildingDetails::all();
            // $detailbangunan = Home::all();
            // $cities = Cities::all();
            // $tipeBangunan = BuildingTypes::all();
            $data=[
                'detailbangunan' => $this->bangunan->getAll(),
                'bangunan' => $this->buildingdetails->getAll(),
                'tipeBangunan' => $this->tipe->getAll(),
                'dataKampus'=>$this->kampus->all_data(),
                'cities' => $this->kotakabupaten->getAll(),
                'user' => $this->user->getAll(),
            ];
            // dd($data, $building);
            return view('home', $data, compact('contentsByContentBasedFiltering'));
            // return view('home',compact(['contentsByContentBasedFiltering', 'building', 'detailbangunan', 'cities', 'tipeBangunan' ]),  $data, );
        }
        else
        {
            $data=[
                'detailbangunan' => $this->bangunan->getAll(),
                'bangunan' => $this->buildingdetails->getAll(),
                'tipeBangunan' => $this->tipe->getAll(),
                'dataKampus'=>$this->kampus->all_data(),
                'cities' => $this->kotakabupaten->getAll(),
                'user' => $this->user->getAll(),
            ];
            return view('home', $data);
        }
        
        
        // dd($contentsByContentBasedFiltering, $data);
    }
    
    
    public function searchwithkeyword(Request $request)
    {
        $search = $request->search;
        $bangunan = DB::table('building_details')
        ->leftjoin('building_types as bt', 'bt.tipe_id', '=', 'building_details.tipe_id')
        ->leftjoin('cities as ct', 'ct.kk_id', '=', 'building_details.kk_id')
        ->where('alamat', 'LIKE', '%'.$search.'%')
        ->orWhere('harga', 'LIKE', '%'.$search.'%')->get();
        //dd($bangunan);
        return view('search', compact('bangunan'));
    }

    public function advanceSearch(Request $request)
    {
        $bangunan = BuildingDetails::where( function($query) use($request){
            return $request->kk_id ?
                   $query->from('cities')->where('kk_id',$request->kk_id) : '';
       })->where(function($query) use($request){
            return $request->tipe_id ?
                   $query->from('building_types')->where('tipe_id',$request->tipe_id) : '';
       })
       ->get();

        return view('search',compact('bangunan'));

    }
}

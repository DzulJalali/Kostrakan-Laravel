<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuildingDetails;
use App\Models\BuildingTypes;
use App\Models\Cities;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class BuildingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->bangunan = new BuildingDetails();
        $this->tipe = new BuildingTypes();
        $this->kotakabu = new Cities();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[
            'bangunan' => $this->bangunan->getAll(),
            
        ];
        // dd($data);
        return view('crud.bangunan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'tipeBangunan' => $this->tipe->getAll(),
            'cities' => $this->kotakabu->getAll(),
            
        ];
        return view('crud.bangunan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'alamat' => 'required',
            'tipe_id' => 'required',
            'kk_id' => 'required',
            'published_date' => 'required',
            'status' => 'required',
            'jmlh_ruangan' => 'required',
            'luas_bangunan' => 'required',
            'jmlh_lantai' => 'required',
            'keterangan_fasilitas' => 'required',
            'harga' => 'required',
            'gambar1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar4' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image1 = $request->file('gambar1');
        $new_image1 = rand(). '.' .$image1->getClientOriginalExtension();

        $image2 = $request->file('gambar2');
        $new_image2 = rand(). '.' .$image2->getClientOriginalExtension();

        $image3 = $request->file('gambar3');
        $new_image3 = rand(). '.' .$image3->getClientOriginalExtension();

        $image4 = $request->file('gambar4');
        $new_image4 = rand(). '.' .$image4->getClientOriginalExtension();

        $data = 
        [
            'user_id' => Auth::user()->user_id,
            'tipe_id' => $request->get('tipe_id'),
            'kk_id' => $request->get('kk_id'),
            'alamat' => $request->alamat,
            'published_date' => $request->published_date,
            'status' => $request->status,
            'jmlh_ruangan' => $request->jmlh_ruangan,
            'luas_bangunan' => $request->luas_bangunan,
            'jmlh_lantai' => $request->jmlh_lantai,
            'keterangan_fasilitas' => $request->keterangan_fasilitas,
            'harga' => $request->harga,
            'gambar1'=> $new_image1,
            'gambar2'=> $new_image2,
            'gambar3'=> $new_image3,
            'gambar4'=> $new_image4,
        ];
        // dd($data);
            $image1->move('uploads', $new_image1);
            $image2->move('uploads', $new_image2);
            $image3->move('uploads', $new_image3);
            $image4->move('uploads', $new_image4);

            $this->bangunan->storeBangunan($data);
            return redirect()->route('bangunan')->with('success', 'Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $contents = BuildingDetails::filteredBySimilarContent($id);
        $content = BuildingDetails::find($id);
        $users = User::all();

        if(sizeof($contents) == 0)
            return 'There aren´t products to recommend';
        else
            // dd($contents);
            return view('recomendation', compact('content', 'contents', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data =
        [
            'editBangunan' => $this->bangunan->editBangunan($id),
            'tipeBangunan' => $this->tipe->getAll(),
            'cities' => $this->kotakabu->getAll(),
        ];
        return view('crud.bangunan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'alamat' => 'required',
            'tipe_id' => 'required',
            'kk_id' => 'required',
            'published_date' => 'required',
            'status' => 'required',
            'jmlh_ruangan' => 'required',
            'luas_bangunan' => 'required',
            'jmlh_lantai' => 'required',
            'keterangan_fasilitas' => 'required',
            'harga' => 'required',
            'gambar1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar4' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input1 = $request->all();
  
        if ($image1 = $request->file('gambar1')) {
            $destinationPath = 'uploads';
            $image_name1 = date('YmdHis') . "." . $image1->getClientOriginalExtension();
            $image1->move($destinationPath, $image_name1);
            $input1['gambar1'] = "$image_name1";
        }
        else
        {
            unset($input1['gambar1']);
        }

        $input2 = $request->all();
  
        if ($image2 = $request->file('gambar2')) {
            $destinationPath = 'uploads';
            $image_name2 = date('YmdHis') . "." . $image2->getClientOriginalExtension();
            $image2->move($destinationPath, $image_name2);
            $input2['gambar2'] = "$image_name2";
        }
        else
        {
            unset($input2['gambar2']);
        }

        $input3 = $request->all();
  
        if ($image3 = $request->file('gambar3')) {
            $destinationPath = 'uploads';
            $image_name3 = date('YmdHis') . "." . $image3->getClientOriginalExtension();
            $image3->move($destinationPath, $image_name3);
            $input3['gambar3'] = "$image_name3";
        }
        else
        {
            unset($input3['gambar3']);
        }
        
        $input4 = $request->all();
  
        if ($image4 = $request->file('gambar4')) {
            $destinationPath = 'uploads';
            $image_name4 = date('YmdHis') . "." . $image4->getClientOriginalExtension();
            $image4->move($destinationPath, $image_name4);
            $input4['gambar4'] = "$image_name4";
        }
        else
        {
            unset($input4['gambar4']);
        }

        $data = 
        [
            'user_id' => Auth::user()->user_id,
            'tipe_id' => $request->get('tipe_id'),
            'kk_id' => $request->get('kk_id'),
            'alamat' => $request->alamat,
            'published_date' => $request->published_date,
            'status' => $request->status,
            'jmlh_ruangan' => $request->jmlh_ruangan,
            'luas_bangunan' => $request->luas_bangunan,
            'jmlh_lantai' => $request->jmlh_lantai,
            'keterangan_fasilitas' => $request->keterangan_fasilitas,
            'harga' => $request->harga,
            'gambar1'=> $image_name1,
            'gambar2'=> $image_name2,
            'gambar3'=> $image_name3,
            'gambar4'=> $image_name4,
        ];
        //dd($data);
        $this->bangunan->updateBangunan($id, $data);
            return redirect()->route('bangunan')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->bangunan->deleteBangunan($id);
        return redirect()->route('bangunan')->with('success', 'Data Berhasil Di Hapus');
    }
}

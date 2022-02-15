<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cities;
use Illuminate\Support\Facades\DB;

class CitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->kotakabu = new Cities();
    }

    public function index()
    {
        $data=[
            'cities' => $this->kotakabu->getAll(),
        ];
        return view('crud.cities.index', $data);
    }

    public function create()
    {
        return view('crud.cities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kk' => 'required',
        ]);

        $data = 
        [
            'nama_kk' => $request->nama_kk,
        ];
            $this->kotakabu->storeKotaKabupaten($data);
            return redirect()->route('cities')->with('success', 'Data Berhasil Di tambahkan');
    }

    public function edit($id)
    {
        $data =
        [
            'editCities' => $this->kotakabu->editKotaKabupaten($id),
        ];
        return view('crud.cities.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kk' => 'required',
        ]);

        $data = 
        [
            'nama_kk' => $request->nama_kk,
        ];
            $this->kotakabu->updateKotaKabupaten($id, $data);
            return redirect()->route('cities')->with('success', 'Data Berhasil Di Update');
    }

    public function destroy($id)
    {
        $this->kotakabu->deleteKotaKabupaten($id);
        return redirect()->route('cities')->with('success', 'Data Berhasil Di Hapus');
    }
}

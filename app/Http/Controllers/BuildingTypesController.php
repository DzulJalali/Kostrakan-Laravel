<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuildingTypes;
use Illuminate\Support\Facades\DB;

class BuildingTypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->tipe = new BuildingTypes();
    }

    public function index()
    {
        $data=[
            'tipeBangunan' => $this->tipe->getAll(),
        ];
        return view('crud.tipeBangunan.index', $data);
    }
}

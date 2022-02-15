<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Owner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth');
        $this->owner = new Owner();
    }

    public function index()
    {
        $data=[
            'owner' => $this->owner->getAll(),
        ];
        return view('admin.home', $data);
    }
}

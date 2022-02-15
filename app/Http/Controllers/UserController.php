<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->user = new User();
    }

    public function index()
    {
        $data=[
            'user' => $this->user->getAll(),
        ];
        // dd($data);
        return view('crud.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.users.create');
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
            'name' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('profile_image');
        $new_image = rand(). '.' .$image->getClientOriginalExtension();

        $data = 
        [
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request['password']),
            'role' => $request->role,
            'profile_image' => $new_image,
        ];
        // dd($data);
            $image->move('uploads', $new_image);

            $this->user->storeUser($data);
            return redirect()->route('user')->with('success', 'Data Berhasil Di tambahkan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            'edituser' => $this->user->editUser($id),
        ];
        return view('crud.users.edit', $data);
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
        $old_image_name = $request->hidden_image;
        $image = $request->file('profile_image');

        if($image != null)
        {
            $request->validate([
                'name' => 'required',
                'no_hp' => 'required',
                'email' => 'required',
                'username' => 'required',
                'role' => 'required',
                'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image_name = rand(). '.' .$image->getClientOriginalExtension();
            $image->move('uploads', $image_name);
        }
        else
        {
            $request->validate([
                'name' => 'required',
                'no_hp' => 'required',
                'email' => 'required',
                'username' => 'required',
                'role' => 'required',
            ]);
            $image_name = $old_image_name;
        }

        $data = 
        [
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'username' => $request->username,
            'role' => $request->role,
            'profile_image' => $image_name,
        ];
        
        //dd($data);
        $this->user->updateUser($id, $data);
        return redirect()->route('user')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user->deleteUser($id);
        return redirect()->route('user')->with('success', 'Data Berhasil Di Hapus');
    }


    // User Profile
    public function getById($id)
    {
        $data=[
            'user' => $this->user->detailUser($id),
        ];

        return view('user.profile', $data);
    }

    public function editProfile($id)
    {
        $data =
        [
            'editProfile' => $this->user->editUser($id),
        ];
        return view('user.edit', $data);
    }

    public function updateProfile(Request $request, $id)
    {
        $old_image_name = $request->hidden_image;
        $image = $request->file('profile_image');

        if($image != null)
        {
            $request->validate([
                'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image_name = rand(). '.' .$image->getClientOriginalExtension();
            $image->move('uploads', $image_name);
        }
        else
        {
            $image_name = $old_image_name;
        }

        $data = 
        [
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'username' => $request->username,
            'role' => $request->role,
            'profile_image' => $image_name,
        ];
        
        //dd($data);
        $this->user->updateUser($id, $data);
        return redirect('/user/profile_page/'. $id)->with('success', 'Data Berhasil Di Update');
    }

    public function formChangePassword()
    {
        return view('user.changepassword');
    }
     /**
     * Change the current password
     * @param Request $request
     * @return Renderable
     */
    public function changePassword(Request $request)
    {       
        $user = Auth::user();
    
        $userPassword = $user->password;
        
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|same:confirm_password|min:8',
            'confirm_password' => 'required',
        ]);

        if (!Hash::check($request->current_password, $userPassword)) {
            return back()->withErrors(['current_password'=>'password not match']);
        }

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('/home')->with('success','Password Berhasil Di Update');
    }

}

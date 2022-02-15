<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\AdminController;
use App\Http\LoginController;
use App\Http\RegisterController;
use App\Http\CBFController;
use App\Http\HomeController;
use App\Http\DetailController;
use App\Http\UserController;
use App\Models\BuildingDetails;
use App\Models\ContentBasedFilter;
use App\Models\Exception;
use App\Http\BuildingController;
use App\Http\DaerahController;
use App\Http\KampusController;
use App\Http\KecamatanController;
use App\Http\KelurahanController;
use App\Http\RegisterBangunanController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home/search', [App\Http\Controllers\HomeController::class, 'searchwithkeyword'])->name('search');
Route::get('/home/advancesearch', [App\Http\Controllers\HomeController::class, 'advanceSearch'])->name('advancesearch');



//login with Google
// Google login
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);
Route::get('register/google', [App\Http\Controllers\Auth\RegisterController::class, 'redirectToGoogleRegister'])->name('register.google');
Route::get('register/google/callback', [App\Http\Controllers\Auth\RegisterController::class, 'directToUserNeeds']);

//Route User Needs
Route::get('/register/needs', [App\Http\Controllers\CBFController::class, 'needs'])->name('needs');
Route::post('/register/needs/submit', [App\Http\Controllers\CBFController::class, 'storeNeeds'])->name('rekomendasi');

Route::get('/recommendations', function(){
	$contentsByContentBasedFiltering = BuildingDetails::filteredByUser();
    // dd($contentsByContentBasedFiltering);

    return view('home', compact(['contentsByContentBasedFiltering']));
})->name('recommendations');


Route::get('/admin/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home')->middleware('role');
// Route::get('/admin/home', [App\Http\Controllers\UserController::class, 'viewApprove']);

Route::get('/detail/{id}',[App\Http\Controllers\DetailController::class,'getById']);

//Route Profile
Route::get('/user/profile_page/{id}', [App\Http\Controllers\UserController::class,'getById'])->name('profilePage');
Route::get('/user/profile_page/edit/{id}', [App\Http\Controllers\UserController::class,'editProfile'])->name('editProfile');
Route::post('/user/profile_page/update/{id}', [App\Http\Controllers\UserController::class,'updateProfile'])->name('updateProfile');
Route::get('/user/profile_page/editpassword/{id}', [App\Http\Controllers\UserController::class,'formChangePassword'])->name('editPassword');
Route::post('/user/profile_page/updatepassword', [App\Http\Controllers\UserController::class,'changePassword'])->name('changePassword');

//Route Approval Register Bangunan
// Route::middleware(['approved'])->group(function ()
// {
//     Route::get('/user/register-bangunan/approval', [App\Http\Controllers\RegisterBangunanController::class,'approval'])->name('approvalBangunan');
// });
Route::get('/user/register-bangunan/approval', [App\Http\Controllers\RegisterBangunanController::class,'approval'])->name('approvalBangunan');


//Route Register Bangunan dan pemilik 
Route::get('/user/register-bangunan', [App\Http\Controllers\RegisterBangunanController::class,'displayByUser'])->name('registerBangunan');
Route::get('/user/register-bangunan/create-register-pemilik', [App\Http\Controllers\RegisterBangunanController::class,'createRegisPemilik'])->name('createRegisPemilik');
Route::post('/user/register-bangunan/store-register-pemilik', [App\Http\Controllers\RegisterBangunanController::class,'storeRegisPemilik'])->name('registerPemilik');

Route::get('/user/register-bangunan/create-bangunan', [App\Http\Controllers\RegisterBangunanController::class,'createBangunanByOwner'])->name('createBangunanByOwner');
Route::post('/user/register-bangunan/store-bangunan', [App\Http\Controllers\RegisterBangunanController::class,'storeBangunanByOwner'])->name('storeBangunanByOwner');
Route::get('/user/register-bangunan/edit-bangunan/{id}', [App\Http\Controllers\RegisterBangunanController::class,'editBangunanByOwner'])->name('editBangunanByOwner');
Route::post('/user/register-bangunan/update-bangunan/{id}', [App\Http\Controllers\RegisterBangunanController::class,'updateBangunanByOwner'])->name('updateBangunanByOwner');
Route::get('/user/register-bangunan/delete-bangunan/{id}', [App\Http\Controllers\RegisterBangunanController::class,'destroyBangunanByOwner'])->name('deleteBangunanByOwner');

//Route Approve Owner
Route::get('/admin/approve-owner/{id}', [App\Http\Controllers\RegisterBangunanController::class,'approved'])->name('approve');
Route::get('/admin/remove-approve-owner/{id}', [App\Http\Controllers\RegisterBangunanController::class,'removeApproved'])->name('removeApprove');

//Route CRUD USER
Route::get('/user', [App\Http\Controllers\UserController::class,'index'])->name('user');
Route::get('/user/create', [App\Http\Controllers\UserController::class,'create'])->name('create');
Route::post('/user/store', [App\Http\Controllers\UserController::class,'store'])->name('store');
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class,'edit'])->name('edit');
Route::post('/user/update/{id}', [App\Http\Controllers\UserController::class,'update'])->name('update');
Route::get('/user/delete/{id}', [App\Http\Controllers\UserController::class,'destroy'])->name('delete');

//Route CRUD BANGUNAN
Route::get('/bangunan', [App\Http\Controllers\BuildingController::class,'index'])->name('bangunan');
Route::get('/bangunan/create', [App\Http\Controllers\BuildingController::class,'create'])->name('createBangunan');
Route::post('/bangunan/store', [App\Http\Controllers\BuildingController::class,'store'])->name('storeBangunan');
Route::get('/bangunan/edit/{id}', [App\Http\Controllers\BuildingController::class,'edit'])->name('editBangunan');
Route::post('/bangunan/update/{id}', [App\Http\Controllers\BuildingController::class,'update'])->name('updateBangunan');
Route::get('/bangunan/delete/{id}', [App\Http\Controllers\BuildingController::class,'destroy'])->name('deleteBangunan');

//Route API Daerah
//Daerah
Route::get('/daerah', [App\Http\Controllers\DaerahController::class,'index'])->name('daerah');
Route::get('/daerah/tambah', [App\Http\Controllers\DaerahController::class,'tampilTambah'])->name('tambahDaerah');
Route::post('/daerah/tambahData', [App\Http\Controllers\DaerahController::class,'submitTambahData'])->name('tambahDataDaerah');
Route::get('/daerah/edit/{id}', [App\Http\Controllers\DaerahController::class,'edit']);
Route::post('/daerah/update/{id}', [App\Http\Controllers\DaerahController::class,'submitDataEdit']);
Route::get('/daerah/delete/{id}', [App\Http\Controllers\DaerahController::class,'deleteData']);
Route::get('/daerah/detail/{id}', [App\Http\Controllers\DaerahController::class,'detail']);

//Kecamatan
Route::get('/kecamatan', [App\Http\Controllers\KecamatanController::class,'index'])->name('kecamatan');
Route::get('/kecamatan/tambah', [App\Http\Controllers\KecamatanController::class,'tampilTambah'])->name('tambahKecamatan');
Route::post('/kecamatan/tambahData', [App\Http\Controllers\KecamatanController::class,'submitTambahData'])->name('tambahDataKecamatan');
Route::get('/kecamatan/edit/{id}', [App\Http\Controllers\KecamatanController::class,'edit']);
Route::post('/kecamatan/update/{id}', [App\Http\Controllers\KecamatanController::class,'submitDataEdit']);
Route::get('/kecamatan/delete/{id}', [App\Http\Controllers\KecamatanController::class,'deleteData']);
Route::get('/kecamatan/detail/{id}', [App\Http\Controllers\KecamatanController::class,'detail']);

//Kelurahan
Route::get('/kelurahan', [App\Http\Controllers\KelurahanController::class,'index'])->name('kelurahan');
Route::get('/kelurahan/tambah', [App\Http\Controllers\KelurahanController::class,'tampilTambah'])->name('tambahKelurahan');
Route::post('/kelurahan/tambahData', [App\Http\Controllers\KelurahanController::class,'submitTambahData'])->name('tambahDataKelurahan');
Route::get('/kelurahan/edit/{id}', [App\Http\Controllers\KelurahanController::class,'edit']);
Route::post('/kelurahan/update/{id}', [App\Http\Controllers\KelurahanController::class,'submitDataEdit']);
Route::get('/kelurahan/delete/{id}', [App\Http\Controllers\KelurahanController::class,'deleteData']);
Route::get('/kelurahan/detail/{id}', [App\Http\Controllers\KelurahanController::class,'detail']);

//Tipe Bangunan
Route::get('/admin/tipe-bangunan', [App\Http\Controllers\BuildingTypesController::class,'index'])->name('tipeBangunan');

//Kota Kabupaten
Route::get('/admin/kota-kabupaten', [App\Http\Controllers\CitiesController ::class,'index'])->name('cities');
Route::get('/admin/kota-kabupaten/tambah', [App\Http\Controllers\CitiesController ::class,'create'])->name('tambahKK');
Route::post('/admin/kota-kabupaten/tambahData', [App\Http\Controllers\CitiesController ::class,'store'])->name('tambahDataKK');
Route::get('/admin/kota-kabupaten/edit/{id}', [App\Http\Controllers\CitiesController ::class,'edit'])->name('editDataKK');
Route::post('/admin/kota-kabupaten/update/{id}', [App\Http\Controllers\CitiesController ::class,'update'])->name('updateDataKK');
Route::get('/admin/kota-kabupaten/delete/{id}', [App\Http\Controllers\CitiesController ::class,'destroy'])->name('deleteDataKK');


//Kampus
Route::get('/admin/kampus', [App\Http\Controllers\KampusController ::class,'index'])->name('kampus');
Route::get('/admin/kampus/tambah', [App\Http\Controllers\KampusController::class,'tampilTambah'])->name('tambahKampus');
Route::post('/admin/kampus//tambahData', [App\Http\Controllers\KampusController::class,'submitTambahData'])->name('tambahDataKampus');
Route::get('/admin/kampus/edit/{id}', [App\Http\Controllers\KampusController::class,'edit']);
Route::post('/admin/kampus/update/{id}', [App\Http\Controllers\KampusController::class,'submitDataEdit']);
Route::get('/admin/kampus/delete/{id}', [App\Http\Controllers\KampusController::class,'deleteData']);
Route::get('/admin/kampus/detail/{id}', [App\Http\Controllers\KampusController::class,'detail']);


//
Route::get('/detail-kampus/{id}',[App\Http\Controllers\DetailController::class,'getKoskontrakanbyKampus']);
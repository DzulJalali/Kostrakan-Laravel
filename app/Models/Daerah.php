<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Daerah extends Model
{
    public function all_data(){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJJZFVzZXIiOiIyIiwiVXNlcm5hbWUiOiJ1Y3VwIn0.XFBa7OfjJgqG3545sgb2UuwV66t2TZ3iwwzQG9fOBFY',
            ])->get('http://localhost:8080/api/daerah/', [
                'key' => '123',
            ]);
        return $response['data'];
    }

    public function data_id($id){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJJZFVzZXIiOiIyIiwiVXNlcm5hbWUiOiJ1Y3VwIn0.XFBa7OfjJgqG3545sgb2UuwV66t2TZ3iwwzQG9fOBFY',
            ])->get('http://localhost:8080/api/daerah/'.$id , [
                'key' => '123',
            ]);
        return $response['data'];
    }

    public function searchData($keyword){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJJZFVzZXIiOiIyIiwiVXNlcm5hbWUiOiJ1Y3VwIn0.XFBa7OfjJgqG3545sgb2UuwV66t2TZ3iwwzQG9fOBFY',
        ])->get('http://localhost:8080/api/daerah/search/', [
            'key' => '123',
            'keyword'=>$keyword,
        ]);
        return $response['data'];
    }

    public function tambahData($data){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJJZFVzZXIiOiIyIiwiVXNlcm5hbWUiOiJ1Y3VwIn0.XFBa7OfjJgqG3545sgb2UuwV66t2TZ3iwwzQG9fOBFY',
        ])->post('http://localhost:8080/api/daerah/', [
            'id_daerah' => $data['id_daerah'],
            'nama_daerah' => $data['nama_daerah'],
            'id_kecamatan' => $data['id_kecamatan'],
            'id_kelurahan' => $data['id_kelurahan'],
            'nearBy' => $data['nearBy'],
        ]);
        return redirect()->route('daerah')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function editData($id, $data){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJJZFVzZXIiOiIyIiwiVXNlcm5hbWUiOiJ1Y3VwIn0.XFBa7OfjJgqG3545sgb2UuwV66t2TZ3iwwzQG9fOBFY',
        ])->put('http://localhost:8080/api/daerah/'.$id , [
            'id_daerah' => $data['id_daerah'],
            'nama_daerah' => $data['nama_daerah'],
            'id_kecamatan' => $data['id_kecamatan'],
            'id_kelurahan' => $data['id_kelurahan'],
            'nearBy' => $data['nearBy'],
        ]);
        return redirect()->route('daerah')->with('success', 'Data Berhasil Di Update');
    }

    public function deleteData($id){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJJZFVzZXIiOiIyIiwiVXNlcm5hbWUiOiJ1Y3VwIn0.XFBa7OfjJgqG3545sgb2UuwV66t2TZ3iwwzQG9fOBFY',
        ])->delete('http://localhost:8080/api/daerah/'.$id, [
            'key' => '123',
        ]);
    }
}

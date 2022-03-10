<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Kampus extends Model
{
    public function all_data(){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZF91c2VyIjoiMiIsInVzZXJuYW1lIjoiZmFpc2FsIn0.AHQOMcj5ZPdE1Q5r9jRsOy1hqAqFHdwHNsROHZUaznM',
            ])->get('http://localhost:8080/api/kampus/', [
                'key' => '123',
            ]);
        return $response['data'];
    }

    public function data_id($id){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZF91c2VyIjoiMiIsInVzZXJuYW1lIjoiZmFpc2FsIn0.AHQOMcj5ZPdE1Q5r9jRsOy1hqAqFHdwHNsROHZUaznM',
            ])->get('http://localhost:8080/api/kampus/'.$id , [
                'key' => '123',
            ]);
        return $response['data'];
    }

    public function searchData($keyword){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZF91c2VyIjoiMiIsInVzZXJuYW1lIjoiZmFpc2FsIn0.AHQOMcj5ZPdE1Q5r9jRsOy1hqAqFHdwHNsROHZUaznM',
        ])->get('http://localhost:8080/api/kampus/search/', [
            'key' => '123',
            'keyword'=>$keyword,
        ]);
        return $response['data'];
    }

    public function tambahData($data)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZF91c2VyIjoiMiIsInVzZXJuYW1lIjoiZmFpc2FsIn0.AHQOMcj5ZPdE1Q5r9jRsOy1hqAqFHdwHNsROHZUaznM',
        ])->post('http://localhost:8080/api/kampus/', $data);
    }
    public function editData($id,$data){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZF91c2VyIjoiMiIsInVzZXJuYW1lIjoiZmFpc2FsIn0.AHQOMcj5ZPdE1Q5r9jRsOy1hqAqFHdwHNsROHZUaznM',
        ])->put('http://localhost:8080/api/kampus/'.$id, $data,[
            'key' => '123',
        ]);
        // dd($id);
    }
    public function deleteData($id){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZF91c2VyIjoiMiIsInVzZXJuYW1lIjoiZmFpc2FsIn0.AHQOMcj5ZPdE1Q5r9jRsOy1hqAqFHdwHNsROHZUaznM',
        ])->delete('http://localhost:8080/api/kampus/'.$id, [
            'key' => '123',
        ]);
    }
}

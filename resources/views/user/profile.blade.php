@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{asset('css/profile.css')}}">

<div class="student-profile py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-transparent text-center">
                        <img class="profile_img" src="{{asset('/uploads')}}/{{$user->profile_image}}"
                            alt="...">
                        <h3 class="mt-10">{{$user->username}}</h3>
                    </div>
                    <!-- <div class="card-body">
                        <p class="mb-0"><strong class="pr-1">User ID:</strong>{{$user->user_id}}</p>
                    </div> -->
                    <div style="text-align:center">
                        <a href="{{ route('editProfile', $user->user_id) }}" class="btn btn-primary">Update Profil</a>
                        <a href="{{ route('editPassword', $user->user_id) }}" class="btn btn-primary">Change Password</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Data Diri</h3>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Nama</th>
                                <td width="2%">:</td>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <th width="30%">Nomor HP </th>
                                <td width="2%">:</td>
                                @if($user->no_hp == null)
                                <td>Anda Belum Memasukan Nomor HP</td>
                                @else
                                <td>{{$user->no_hp}}</td>
                                @endif                       
                            </tr>
                            <tr>
                                <th width="30%">Email</th>
                                <td width="2%">:</td>
                                <td>{{$user->email}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div style="height: 26px"></div>
                <div class="card shadow-sm">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Kos atau Kontrakan yang diposting</h3>
                    </div>
                    <div class="card-body pt-0">
                        <p>obat hati ada lima perkaranya yg pertama, baca Qur’an dan maknanya yang kedua, sholat malam
                            dirikanlah yg ketiga, berkumpullah dng orang sholeh yg keempat, perbanyaklah berpuasa yg
                            kelima, dzikir malam perpanjanglah salah satunya siapa bisa menjalani moga-moga Gusti Allah
                            mencukupi!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts_admin.main')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <a href="{{route('daerah')}}" class="d-flex align-items-baseline">
        <i class="fas fa-long-arrow-alt-left"></i>
        <p class="ml-1">Back</p>
    </a>
    
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th scope="col">Nama Kota</th>
                </tr>
                <tr>
               
                <td data-label="Nama Kota">{{$dataDetail['namaKota']}}</td>
               
                </tr>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection

@extends('layouts.petugas.app')

@section('content')
   <h1>Selamat Datang Petugassss</h1>
   <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">NIK</th>
            <th scope="col">Isi</th>
            <th scope="col">Foto</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pengaduan as $pengaduan)
                <tr>
                    <th scope="row">{{ $pengaduan->nik }}</th>
                    <td>{{ $pengaduan->isi_laporan }}</td>
                    <td><img src='{{asset("storage/image/".$pengaduan->foto)}}' width="100px"/></td>
                    <td>
                        <a class="btn btn-sm btn-primary" href={{url("petugas/detail-pengaduan/$pengaduan->id_pengaduan")}}>Detail</a>
                    </td>

                </tr>
            @endforeach
    </tbody>
   </table>
@endsection

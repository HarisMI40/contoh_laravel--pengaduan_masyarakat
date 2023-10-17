@extends('layouts.app')

@section('content')
    {{ $judul }}
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
                        {{-- <a href="hapus.php?id=<?= $pengaduan->id_pengaduan ?>">Hapus</a> --}}
                        <a href={{ url("/hapus-pengaduan/$pengaduan->id_pengaduan")}}>Hapus</a>
                        <a href={{ url("/detail-pengaduan/$pengaduan->id_pengaduan")}}>Detail</a>
                        <a href={{ url("/update-pengaduan/$pengaduan->id_pengaduan")}}>Update</a>
                    </td>

                </tr>
            @endforeach


        </tbody>
    </table>
@endsection

@extends('layouts.app')

@section('content')
    {{ $judul }}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">NIK</th>
                <th scope="col">Isi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengaduan as $pengaduan)
                <tr>
                    <th scope="row">{{ $pengaduan->nik }}</th>
                    <td>{{ $pengaduan->isi_laporan }}</td>
                    <td>
                        {{-- <a href="hapus.php?id=<?= $pengaduan->id_pengaduan ?>">Hapus</a> --}}
                        <a href="/hapus-pengaduan/{{$pengaduan->id_pengaduan}}">Hapus</a>
                        <a href="/detail-pengaduan/{{$pengaduan->id_pengaduan}}">Detail</a>
                    </td>

                </tr>
            @endforeach


        </tbody>
    </table>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href={{ asset("bs/css/bootstrap.min.css") }}>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Detail Pengaduan</h1>
        @auth('petugas')
            @if(session("success"))
                <div class="alert alert-success">
                    Berhasil Update Status Pengaduan
                </div>
            @endif
            <form action="{{url('/petugas/pengaduan/update/status/' . $data->id_pengaduan)}}" method="post">
                @method("POST")
                @CSRF
                <select name="status_pengaduan">
                    <option value="0">Belum Di tindak Lanjuti</option>
                    <option value="proses">Proses</option>
                    <option value="selesai">Selesai</option>
                    <option value="batal">Batal</option>
                </select>

                <button class="btn btn-success btn-sm">Update</button>
            </form>
        @endauth
        <p class="text-mute">NIK : {{ $data->nik }}</p>
        <p class="text-mute">Status : {{ $data->status == "0" ? "Belum Di Tindak Lanjuti" : $data->status }}</p>
        <p class="bg-secondary p-5">{{ $data->isi_laporan}}</p>

        @auth("petugas")
            <div class="">
                <div>
                    <textarea name="" id="" style="width: 100%">

                    </textarea>
                </div>
                <button class="btn btn-primary">Tanggapi</button>
            </div>
        @endauth

        <h1>Tanggapan</h1>
        @foreach($tanggapan as $tanggapan)
            <div class="bg-info mb-3 p-3">
                <p>Petugas : {{ $tanggapan->nama_petugas }} </p>
                <p>{{ $tanggapan->tanggapan }}</p>
            </div>
        @endforeach
    </div>
</body>
</html>

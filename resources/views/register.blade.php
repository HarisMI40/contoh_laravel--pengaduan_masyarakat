<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Register</h1>
    <form action={{url('register')}} method="post">
        @method("POST")
        @csrf
        <div>
            NIK : <input type="text" name="nik" id="">
        </div>
        <div>
            Nama : <input type="text" name="nama" id="">
        </div>
        <div>
            Username : <input type="text" name="username" id="">
        </div>
        <div>
            Password : <input type="password" name="password" id="">
        </div>
        <div>
            Telp : <input type="text" name="telp" id="">
        </div>
    <input type="submit" value="Simpan">

</form>
</body>
</html>

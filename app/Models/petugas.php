<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class petugas extends Authenticatable
{
    use HasFactory;
    protected $table = "petugas";
    protected $guard = "petugas";

    protected $fillable = ['nama', 'username', 'password', 'telp', 'level'];

    protected $hidden = [
        'password',
    ];
}

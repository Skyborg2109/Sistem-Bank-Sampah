<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    use HasFactory;
    protected $table = 'data_user_tabel';
    protected $fillable = ['nama_user','username', 'email','password','role'];

    protected $hidden = [
        'password',
    ];
}
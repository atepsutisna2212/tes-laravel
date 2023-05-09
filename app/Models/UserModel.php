<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $guard = 'id';
    protected $fillable = [
        'username',
        'password2',
        'nama',
        'telp',
        'status',
        'email',
        'password',
    ];

    // public function getAuthPassword()
    // {
    //     return $this->password;
    // }
}

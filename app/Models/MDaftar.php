<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MDaftar extends Model
{
    use HasFactory;
    protected $table = 'tb_daftar_konser';
    protected $primaryKey = 'id_daftar';
    protected $guard = 'id_daftar';
    protected $fillable = [
        'ID',
        'nama',
        'telp',
        'id_user',
        'ket',
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'id_user');
    }
}

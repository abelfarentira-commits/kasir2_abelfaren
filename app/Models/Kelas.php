<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
        'user_id',
        'jurusan_id',
        'jenjang_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

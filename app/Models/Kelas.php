<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $fillable = ['nama_kelas', 'jenjang_id', 'jurusan', 'status'
    ];

    public function Kelas()
    {
        return $this->belongsTo(jenjang::class, 'jenjang_id');
    }
}

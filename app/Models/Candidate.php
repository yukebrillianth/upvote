<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kandidat',
        'visi', 'misi',
        'slogan',
        'image',
        'kelas_id'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function jumlah_pemilih()
    {
        return $this->belongsToMany(User::class, 'votes', 'candidates_id', 'users_id');
    }
}

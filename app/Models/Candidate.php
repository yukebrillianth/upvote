<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = ['nama_kandidat', 'visi', 'misi', 'program_kerja', 'image', 'kelas_id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}

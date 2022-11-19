<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @fillable array
     */
    protected $fillable = [
        'user_id',
        'details',
        'userIp',
        'vote_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

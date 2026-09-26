<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pengumuman extends Model
{
    protected $table = 'pengumumen';

    protected $primaryKey = 'id_pengumuman';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}


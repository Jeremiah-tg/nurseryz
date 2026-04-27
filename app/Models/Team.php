<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $fillable = [
        'name',
    ];

    // Users in this team
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}

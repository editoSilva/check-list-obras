<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'status'
    ];

    public function companies()
    {
        $this->hasMany(Company::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'status'
    ];

    public function companies()
    {
        $this->hasMany(Company::class);
    }

    protected function casts(): array
    {
        return [
            'name'   => 'string',
            'status' => 'boolean'
        ];
    }
}

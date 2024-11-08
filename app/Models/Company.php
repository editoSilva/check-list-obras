<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $with = ['category'];

    protected $fillable = [
        'category_id',
        'logo',
        'name',
        'cnpj',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }



}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companies extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'password',
    ];


    public function companies_categories() {
        return $this->belongsToMany(Categories::class, 'Companies_categories', 'companies_id',  'categories_id');
    }
}

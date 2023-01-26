<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies_categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'companies_id',
        'categories_id',
    ];

    public function categories() {
        return $this->hasMany(Categories::class);
    }

    public function companies() {
        return $this->belongsTo(Companies::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =[
        'name', 'name_en'
    ];

    public function applicants()
    {
        return $this->belongsTo(Cart::class);
    }

    public function packages()
    {
         return $this->hasMany(Package::class);
    }

    function getNameLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->name_en;
        } else {
            return $this->name;
        }
    }
}

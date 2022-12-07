<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $fillable = ['name','price','Time','currency_id'];

    public function currency(){
        return $this->belongsTo(Currency::class);
    }
    public function priceservices(){
        return $this->hasMany(PricesService::class,'price_id');
    }
}

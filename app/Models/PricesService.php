<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricesService extends Model
{
    use HasFactory;
    protected $fillable = ['name','price_id','activating'];
    public function price(){
        return $this->belongsTo(Price::class);
    }
}

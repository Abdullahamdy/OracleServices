<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerReview extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'work','rating','text'];
    public  function attachments()
    {
        return $this->hasMany(Attachment::class,'customer_review_id');
    }


}

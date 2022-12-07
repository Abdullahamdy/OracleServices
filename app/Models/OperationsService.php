<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationsService extends Model
{
    protected $fillable = ['name','text'];
    use HasFactory;
    public  function attachments()
    {
        return $this->hasMany(Attachment::class,'operation_servic_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'path', 'service_id', 'package_id','operation_servic_id','customer_review_id'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    public function operationservic()
    {
        return $this->belongsTo(OperationsService::class,'operation_servic_id');
    }
}

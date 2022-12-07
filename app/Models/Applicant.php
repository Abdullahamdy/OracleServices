<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applicant extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable =[
        'user_id',
        'service_id',
        'package_id',
        'status',
        'price',
        'due_date',
        'reason_cancellation',
        'text',
        'file',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    function users()
    {
        return $this->belongsToMany(User::class , Cart::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    static function statusList($status = "")
    {
        $array = [
            0 => __('New Cart'),
            1 => __('Cart in progress'),
            2 => __('Active Cart'),
            3 => __('Expired Cart'),
            4 => __('Canceled Cart'),
            5 => __('Cart Permanently cancelled'),
        ];

        if ($status === false) {
            return $array;
        }

        if (!is_string($status) and $status != false or $status >= 0) {
            return !empty($array[$status]) ? $array[$status] : $status;
        }
        return $array;
    }


//    static function statusInvoice($status = "")
//    {
//        $array = [
//            0 => __('New Cart'),
//            1 => __('In progress'),
//            2 => __('Active Cart'),
//            3 => __('Expired Cart'),
//            4 => __('Canceled Cart'),
//            5 => __('Cart Permanently cancelled'),
//        ];
//
//        if ($status === false) {
//            return $array;
//        }
//
//        if (!is_string($status) and $status != false or $status >= 0) {
//            return !empty($array[$status]) ? $array[$status] : $status;
//        }
//
//
//        return $array;
//    }

    public function getFileAttribute($value)
    {
        if ($value){
            return url('storage/' . $value);
        }
    }
}

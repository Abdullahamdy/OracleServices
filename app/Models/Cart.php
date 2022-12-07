<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable =[
        'user_id',
        'service_id',
        'package_id',
        'status',
        'price_after',
        'due_date',
        'reason_cancellation',
        'reason_cancellation_en',
        'text',
        'text_en',
        'file',
        'end_date',
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
            0 => __('In Cart'),
            1 => __('New Applicant'),
            2 => __('Applicant in progress'),
            3 => __('Active Applicant'),
            4 => __('Expired Applicant'),
            5 => __('Canceled Applicant'),
            6 => __('Applicant Permanently cancelled'),
        ];

        if ($status === false) {
            return $array;
        }

        if (!is_string($status) and $status != false or $status >= 0) {
            return !empty($array[$status]) ? $array[$status] : $status;
        }
        return $array;
    }

    static function statusActiveList($status = "")
    {
        $array = [
            3 => __('Active Applicant'),
        ];

        if ($status === false) {
            return $array;
        }

        if (!is_string($status) and $status != false or $status >= 0) {
            return !empty($array[$status]) ? $array[$status] : $status;
        }
        return $array;
    }

    public function getFileAttribute($value)
    {
        if ($value){
            return url('storage/' . $value);
        }
    }

    function getReasonCancellationLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->reason_cancellation_en;
        } else {
            return $this->reason_cancellation;
        }
    }

    function getTextLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->text_en;
        } else {
            return $this->text;
        }
    }
}

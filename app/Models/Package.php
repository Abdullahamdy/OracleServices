<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'name_en',
        'price',
        'type_id',
        'discount',
        'tax',
        'price_after',
        'status_id',
        'description',
        'description_en',
        'service_id',
        'days',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function statuses()
    {
        return $this->hasMany(Status::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    static function statusList($status = "")
    {
        $array = [
            0 => __('Available'),
            1 => __('Finished'),
        ];

        if ($status === false) {
            return $array;
        }

        if (!is_string($status) and $status != false or $status >= 0) {
            return !empty($array[$status]) ? $array[$status] : $status;
        }
        return $array;
    }

    static function typeList($type = "")
    {
        $array = [
            0 => __('Annual'),
            1 => __('Year Text'),
            2 => __('Quarterly'),
            3 => __('Once'),
        ];

        if ($type == "") {
            return $array;
        } else {
            return !empty($array[$type]) ? $array[$type] : $type;
        }
    }

    function getNameLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->name_en;
        } else {
            return $this->name;
        }
    }

    function getDescriptionLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->description_en;
        } else {
            return $this->description;
        }
    }
}

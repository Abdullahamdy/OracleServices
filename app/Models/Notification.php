<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title', 'title_en', 'message','operation_servic_id', 'message_en', 'user_id', 'service_id', 'package_id','category_id','customer_review_id', 'token'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    function getTitleLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->title_en;
        } else {
            return $this->title;
        }
    }

    function getMessageLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->message_en;
        } else {
            return $this->message;
        }
    }
}

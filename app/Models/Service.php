<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role;

class Service extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'short_description',
        'full_description',
        'begin',
        'end',
        'status',
        'role_id',
        'category_id',
        'token'
    ];

    static function statusList($status = "")
    {
        $array = [
            0 => __('Inactive'),
            1 => __('Active'),
        ];

        if ($status === false) {
            return $array;
        }

        if (!is_string($status) and $status != false or $status >= 0) {
            return !empty($array[$status]) ? $array[$status] : $status;
        }
        return $array;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    function applicants()
    {
        return $this->hasMany(Cart::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public  function attachments()
    {
        return $this->hasMany(Attachment::class);
    }


    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    function getNameLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->name_en;
        } else {
            return $this->name;
        }
    }

    function getShortDescriptionLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->short_description_en;
        } else {
            return $this->short_description;
        }
    }

    function getFullDescriptionLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->full_description_en;
        } else {
            return $this->full_description;
        }
    }


  
    
     public function category()
      {
        return $this->belongsTo(Category::class);
     }

    public function getAllCategoryAttribute()
    {
       
      $category =   Category::where('id', '=', $this->category->id)
            ->orWhere(function ($query)  {
              $query->where('parent_id',$this->category->id);
            })->get();
         return $category;
       
    }
   




}

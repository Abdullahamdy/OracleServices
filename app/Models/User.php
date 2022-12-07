<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use SoftDeletes, HasRoles, HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'dera_socialite_id',
        'image',
        'mobile',
        'birth_date',
        'country',
        'token',
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getImageAttribute($value)
    {
        return $value ? $value : url('storage/attachments/BLCZN79PiHsgXbILiauUezfKJz7cddzyh9PenVoG.jpg');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    function email($title, $message) {

        $data = [
            "sender" => [
                "name" => "شركة درع",
                "email" => "noreply@shieldit.sa"
            ],

            "to" => [
                [
                    "name" => $this->name,
                    "email" => $this->email
                ]
            ],

            "subject" => $title,
            "htmlContent" => $message,

            "user_id" => $this->id,
            "status" => 1,
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.sendinblue.com/v3/smtp/email',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                'api-key: '.env('SENDINBLUEAPIKEY'),
                'content-type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }

    public function telescope_emails()
    {
        return $this->hasMany(TelescopeEmail::class);
    }
}

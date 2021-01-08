<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Provider\Miscellaneous;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin',
        'first_name',
        'last_name',
        'email',
        'api_key',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'email_verified_at',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'admin' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    public function dispatch(){
        return $this->hasMany(Dispatch::class);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function setApiKeyAttribute($value = null)
    {
        if ($value == null || $value == ''){
            $this->attributes['api_key'] = Miscellaneous::md5();
        }
        else{
            $this->attributes['api_key'] = $value;
        }
    }

}

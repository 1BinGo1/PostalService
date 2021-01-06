<?php

namespace App\Models;

use Faker\Provider\Miscellaneous;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispatch extends Model
{
    use HasFactory;
    protected $table = 'dispatch';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'track_code',
        'status',
        'city_dispatch',
        'city_destination',
        'price',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'price' => 'float',
    ];

    public function history()
    {
        return $this->hasMany(DispatchHistory::class);
    }

}

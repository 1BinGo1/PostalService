<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispatchHistory extends Model
{
    use HasFactory;
    protected $table = "dispatch_history";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dispatch_id',
        'status',
        'city_dispatch',
        'city_destination',
    ];

}

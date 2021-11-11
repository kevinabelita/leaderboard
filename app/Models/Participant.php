<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'age',
        'points',
        'address',
    ];

     /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    // override creating event, set points to zero initially
    public static function boot()
    {
        parent::boot();

        static::creating(function($participant) {
            $participant->points = 0;
        });
    }
}
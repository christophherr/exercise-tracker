<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model {

    protected $fillable = [
        'user_id', 'description', 'duration', 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

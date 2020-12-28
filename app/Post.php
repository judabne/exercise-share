<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bodyPart()
    {
        return $this->belongsTo(BodyPart::class);
    } // is the link between the tables here necessary?
}

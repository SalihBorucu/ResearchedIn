<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
        protected $fillable = [
        'user_id', 'research_sheet'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

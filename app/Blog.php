<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $fillable = [
        'title',
        'body',
        'category',
        'user_id_foreign',
        'image',
        'published',
        'views',
        'likes'                   
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id_foreign');
    }
}

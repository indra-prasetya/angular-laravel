<?php

namespace Camp;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $fillable = [
        'title',
        'body'
    ];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
//table name
protected $table = 'posts';

//primary key
public $primaryKey='id';

//timestamps
public $timestamps = true;

//(9) create a relationship - a post can have only 1 user
public function user(){
    return $this->belongsTo('App\user');
}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    //
    protected $fillable = ['title', 'date', 'sum', 'comment'];

    protected $table = 'finances';
//
    public $primaryKey = 'id';
//
    public $timestamps = true;

    public function category(){
        return $this->hasOne('App\Category');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    //
    public static $rules = array(
        'title'             => 'required',                        // just a normal required validation
            // required and has to match the password field
    );

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

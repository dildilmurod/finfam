<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['title'];

    protected $table = 'categories';
//
    public $primaryKey = 'id';

    public function finance(){
        return $this->hasMany('App\Finance');
    }
}

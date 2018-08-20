<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{
    //
    public function index(){
        return Redirect::to('/finance') ;
        return view('page.index');
    }
}

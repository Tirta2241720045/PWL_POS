<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Articles extends Controller
{
    public function articles($id){
        return 'Halaman Artikel dengan ID '.$id;
    }
}
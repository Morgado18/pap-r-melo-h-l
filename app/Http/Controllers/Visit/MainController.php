<?php

namespace App\Http\Controllers\Visit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //

    public function list_products(){
        return view('visit.products');
    }

    public function view_create_buyer(){
        return view('visit.buyer');
    }
    public function view_create_producer()
    {
        return view('visit.producer');
    }

}

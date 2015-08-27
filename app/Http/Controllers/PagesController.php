<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function showResume()
    {
        return view('pages.resume');
    }


    public function showPortfolio()
    {
        return view('pages.portfolio');
    }
}

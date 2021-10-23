<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{

    public function reportView()
    {
       
        return view('backend.reports.reports_view');

    }



}

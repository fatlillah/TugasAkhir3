<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $total_inputan = Nama::select(DB::row("nama"))
        ->GroupBy(DB::row("Month(created_at)"))
        ->pluck('nama');

        
    }
}

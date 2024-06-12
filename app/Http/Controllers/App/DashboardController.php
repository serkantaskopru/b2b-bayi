<?php

namespace App\Http\Controllers\App;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('app.pages.dashboard');
    }
}

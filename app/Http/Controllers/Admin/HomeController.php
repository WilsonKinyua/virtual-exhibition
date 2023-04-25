<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;

class HomeController
{
    public function index()
    {
        return Inertia::render('Home');
    }

    public function exhibitorDetails($slug)
    {
        return Inertia::render('exhibitors/ExhibitorDetails');
    }
}

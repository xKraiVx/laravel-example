<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DemoController extends Controller
{
    public function Index(Request $request)
    {
        return Inertia::render('demo');
    }

    public function ContactMethod(Request $request)
    {
        return Inertia::render('contact');
    }
}

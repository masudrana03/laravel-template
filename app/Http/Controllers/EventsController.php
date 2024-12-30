<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function show()
    {
        return Inertia::render('Show', [
            'test' => "inertia js is test successful",
        ]);
    }
}

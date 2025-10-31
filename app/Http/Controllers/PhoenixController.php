<?php

namespace App\Http\Controllers;


use Inertia\Inertia;

class PhoenixController extends Controller
{
    public function index()
    {
        return Inertia::render('Phoenix', [
            'message' => 'Hello from Laravel! Learning about props + vue!'
        ]);
    }
}

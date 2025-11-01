<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class InventroyController extends Controller
{
    public function index()
    {
        return Inertia::render('Inventory', ['message' => 'Hello from laravel. This is prop sending data to page.vue']);
    }
}

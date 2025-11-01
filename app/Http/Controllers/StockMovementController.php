<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class StockMovementController extends Controller
{
    public function index()
    {
        return Inertia::render('StockTransactions', ['message' => 'stock transactions page']);
    }
}

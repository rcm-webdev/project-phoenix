<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ItemController extends Controller
{
    public function index()
    {
        return Inertia::render('Item/Index', [
            'items' => Item::paginate(15)
        ]);
    }

    public function create()
    {
        return Inertia::render('Item/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sku' => 'required|string|unique:items',
            'name' => 'required|string',
            'category' => 'required|string',
            'unit' => 'required|string',
            'description' => 'nullable|string',
            'reorder_level' => 'nullable|integer|min:0',
        ]);
        Item::create($validated);

        return redirect()->route('items.index')->with('success', 'Item created');
    }

    public function show(Item $item)
    {
        return Inertia::render('Item/Show', [
            'item' => $item,
        ]);
    }

    public function edit(Item $item)
    {
        return Inertia::render('Item/Edit', [
            'item' => $item,
        ]);
    }

    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'sku' => 'required|string|unique:items,sku,' . $item->id,
            'name' => 'required|string',
            'category' => 'required|string',
            'unit' => 'required|string',
            'description' => 'nullable|string',
            'reorder_level' => 'nullable|integer|min:0',
        ]);
        $item->update($validated);

        return redirect()->route('items.index')->with('success', 'Item updated');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted');
    }
}
